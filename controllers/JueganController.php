<?php

namespace app\controllers;

use app\models\juegan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JueganController implements the CRUD actions for juegan model.
 */
class JueganController extends Controller
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
     * Lists all juegan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => juegan::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idjuegan' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single juegan model.
     * @param int $idjuegan Idjuegan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idjuegan)
    {
        return $this->render('view', [
            'model' => $this->findModel($idjuegan),
        ]);
    }

    /**
     * Creates a new juegan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new juegan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idjuegan' => $model->idjuegan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing juegan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idjuegan Idjuegan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idjuegan)
    {
        $model = $this->findModel($idjuegan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idjuegan' => $model->idjuegan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing juegan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idjuegan Idjuegan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idjuegan)
    {
        $this->findModel($idjuegan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the juegan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idjuegan Idjuegan
     * @return juegan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idjuegan)
    {
        if (($model = juegan::findOne(['idjuegan' => $idjuegan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
