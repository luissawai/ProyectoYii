<?php

namespace app\controllers;

use app\models\partidas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PartidasController implements the CRUD actions for partidas model.
 */
class PartidasController extends Controller
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
     * Lists all partidas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => partidas::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idpartidas' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single partidas model.
     * @param int $idpartidas Idpartidas
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idpartidas)
    {
        return $this->render('view', [
            'model' => $this->findModel($idpartidas),
        ]);
    }

    /**
     * Creates a new partidas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new partidas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idpartidas' => $model->idpartidas]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing partidas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idpartidas Idpartidas
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idpartidas)
    {
        $model = $this->findModel($idpartidas);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpartidas' => $model->idpartidas]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing partidas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idpartidas Idpartidas
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idpartidas)
    {
        $this->findModel($idpartidas)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the partidas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idpartidas Idpartidas
     * @return partidas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idpartidas)
    {
        if (($model = partidas::findOne(['idpartidas' => $idpartidas])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
