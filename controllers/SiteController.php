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


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    // filepath: c:\xampp\htdocs\dam\yii2\ProyectoAC\controllers\SiteController.php
    public function actionLogin()
    {
        $this->layout = 'main'; // Asegúrate de que el diseño principal se aplique
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionRegister()
{
    $model = new RegisterForm();

    if ($model->load(Yii::$app->request->post()) && $model->register()) {
        return $this->redirect(['site/login']);
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
}
