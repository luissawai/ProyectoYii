<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegisterForm;

use app\models\Personajes;
use app\models\Partidas;
use app\models\Jugadores;
use app\models\Juegos;
use app\models\Modulos;
use app\models\User;
use yii\helpers\VarDumper;
use yii\web\Cookie;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $mostrarConsentimiento = !Yii::$app->request->cookies->has('consentimiento_cookies');

        if (!Yii::$app->user->isGuest) {
            $userId = Yii::$app->user->id;

            // Obtener el jugador asociado al usuario
            $jugador = Jugadores::find()->where(['user_id' => $userId])->one();

            if ($jugador) {
                // Consultas corregidas usando las relaciones adecuadas
                $totalPersonajes = Personajes::find()
                    ->where(['idjugadores' => $jugador->idjugadores])
                    ->count();

                $totalPartidas = Partidas::find()
                    ->joinWith('juegan')
                    ->where(['juegan.idjugadores' => $jugador->idjugadores])
                    ->count();

                $totalJugadores = Jugadores::find()
                    ->where(['user_id' => $userId])
                    ->count();
            } else {
                // Si no tiene jugador asociado, establecer valores a 0
                $totalPersonajes = 0;
                $totalPartidas = 0;
                $totalJugadores = 0;
            }

            return $this->render('dashboard', [
                'totalPersonajes' => $totalPersonajes,
                'totalPartidas' => $totalPartidas,
                'totalJugadores' => $totalJugadores,
                'mostrarConsentimiento' => $mostrarConsentimiento,
            ]);
        }

        // Datos públicos si el usuario no está logueado
        $totalPersonajes = Personajes::find()->count();
        $totalPartidas = Partidas::find()->count();
        $totalJugadores = Jugadores::find()->count();

        return $this->render('index', [
            'totalPersonajes' => $totalPersonajes,
            'totalPartidas' => $totalPartidas,
            'totalJugadores' => $totalJugadores,
            'mostrarConsentimiento' => $mostrarConsentimiento,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            // Add debugging
            Yii::debug('Intento de login con: ' . print_r([
                'username' => $model->username,
                'password exists' => !empty($model->password),
            ], true));

            // Try to find the user first
            $user = User::findByUsername($model->username);
            Yii::debug('Usuario encontrado: ' . ($user ? 'Sí' : 'No'));

            if ($user) {
                Yii::debug('Datos del usuario: ' . print_r([
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'password exists' => !empty($user->password),
                ], true));
            }

            if ($model->login()) {
                return $this->goBack();
            } else {
                Yii::error('Errores de login: ' . print_r($model->errors, true));
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister()
    {
        $model = new RegisterForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = new User();
            $user->username = $model->username;
            $user->email = $model->email;

            // Debug password setting
            Yii::debug('Setting password for new user');
            try {
                $user->setPassword($model->password);
                Yii::debug('Password hash generated successfully');
            } catch (\Exception $e) {
                Yii::error('Error setting password: ' . $e->getMessage());
            }

            $user->generateAuthKey();

            if ($user->save()) {
                Yii::debug('User saved successfully with ID: ' . $user->id);
                return $this->redirect(['site/login']);
            } else {
                Yii::error('User save errors: ' . print_r($user->errors, true));
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * 🔍 Búsqueda global
     */
    public function actionSearch($q = '')
    {
        $results = [];

        if (!empty($q)) {
            $results['jugadores'] = Jugadores::find()
                ->where(['like', 'nombre', $q])
                ->all();

            $results['personajes'] = Personajes::find()
                ->where(['like', 'nombre', $q])
                ->all();

            $results['juegos'] = Juegos::find()
                ->where(['like', 'nombre', $q])
                ->all();

            $results['modulos'] = Modulos::find()
                ->where(['like', 'nombre', $q])
                ->all();

            $results['partidas'] = Partidas::find()
                ->where(['like', 'nombre', $q])
                ->all();
        }

        return $this->render('search', [
            'query' => $q,
            'results' => $results,
        ]);
    }

    public function actionConsentimientoCookies()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        try {
            if (\Yii::$app->request->isPost) {
                $data = \Yii::$app->request->getRawBody();
                $parsed = json_decode($data, true);

                if (!$parsed) {
                    return ['success' => false, 'message' => 'Datos inválidos'];
                }

                $cookie = new \yii\web\Cookie([
                    'name' => 'consentimiento_cookies',
                    'value' => json_encode($parsed),
                    'expire' => time() + 86400 * 365,
                    'secure' => !YII_DEBUG,
                    'httpOnly' => true,
                ]);

                \Yii::$app->response->cookies->add($cookie);
                return ['success' => true];
            }

            return ['success' => false, 'message' => 'Método no permitido'];
        } catch (\Exception $e) {
            \Yii::error('Error al guardar cookies: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Error al guardar preferencias'];
        }
    }

    // Método de depuración
    public function actionDebugCookies()
    {
        if (!YII_DEBUG) {
            return $this->redirect(['site/index']);
        }

        echo '<pre>';
        echo "Estado actual de las cookies:\n";
        VarDumper::dump(Yii::$app->request->cookies->toArray());
        echo "\nCookie de consentimiento:\n";
        VarDumper::dump(Yii::$app->request->cookies->get('consentimiento_cookies'));
        echo '</pre>';
        die();
    }

    public function actionDashboard()
    {
        // Verificar que el usuario está autenticado
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        return $this->render('dashboard');
    }

    public function actionTestLogin()
    {
        $user = User::findByUsername('prueba@prueba.com');

        if (!$user) {
            echo "Usuario no encontrado";
            return;
        }

        $valid = $user->validatePassword('123456789');
        echo $valid ? "Contraseña válida" : "Contraseña inválida";

        Yii::debug('Contraseña almacenada: ' . $user->password);
    }
}
