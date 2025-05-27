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
        // Obtener conteos desde la base de datos
        $totalPersonajes = Personajes::find()->count();
        $totalPartidas = Partidas::find()->count();
        $totalJugadores = Jugadores::find()->count();

        $params = [
            'totalPersonajes' => $totalPersonajes,
            'totalPartidas' => $totalPartidas,
            'totalJugadores' => $totalJugadores,
            'mostrarConsentimiento' => !Yii::$app->request->cookies->has('consentimiento_cookies')
        ];

        if (!Yii::$app->user->isGuest) {
            return $this->render('dashboard', $params);
        }

        return $this->render('index', $params);
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'main';
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
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
        $model = new \app\models\RegisterForm(); // o el modelo que estés usando

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = new User();
            $user->username = $model->username;
            $user->email = $model->email;
            $user->setPassword($model->password); // Asume que tienes este método
            $user->generateAuthKey();
            $user->generateAccessToken();

            if ($user->save()) {
                Yii::$app->session->setFlash('success', 'Gracias por registrarte. Ahora puedes iniciar sesión.');
                return $this->redirect(['site/login']);
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
        $request = Yii::$app->request;
        if ($request->isPost) {
            $data = json_decode($request->getRawBody(), true);
            $cookies = Yii::$app->response->cookies;

            $cookies->add(new \yii\web\Cookie([
                'name' => 'consentimiento_cookies',
                'value' => json_encode($data),
                'expire' => time() + 365 * 24 * 60 * 60, // 1 año
            ]));

            return $this->asJson(['status' => 'ok']);
        }

        throw new \yii\web\BadRequestHttpException();
    }
    private function setCookiePreference($name, $value)
    {
        Yii::$app->response->cookies->add(new Cookie([
            'name' => $name,
            'value' => $value ? '1' : '0',
            'expire' => time() + 86400 * 365,
            'httpOnly' => true
        ]));
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
}
