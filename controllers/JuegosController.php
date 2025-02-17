<?php

namespace app\controllers;

use app\models\juegos;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JuegosController implements the CRUD actions for juegos model.
 */
class JuegosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all juegos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => juegos::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idjuegos' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single juegos model.
     * @param int $idjuegos Idjuegos
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idjuegos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idjuegos),
        ]);
    }

    /**
     * Creates a new juegos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new juegos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idjuegos' => $model->idjuegos]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing juegos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idjuegos Idjuegos
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idjuegos)
    {
        $model = $this->findModel($idjuegos);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idjuegos' => $model->idjuegos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing juegos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idjuegos Idjuegos
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idjuegos)
    {
        $this->findModel($idjuegos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the juegos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idjuegos Idjuegos
     * @return juegos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idjuegos)
    {
        if (($model = juegos::findOne(['idjuegos' => $idjuegos])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
