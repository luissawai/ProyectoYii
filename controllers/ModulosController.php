<?php

namespace app\controllers;

use app\models\modulos;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ModulosController implements the CRUD actions for modulos model.
 */
class ModulosController extends Controller
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
     * Lists all modulos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => modulos::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idmodulos' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single modulos model.
     * @param int $idmodulos Idmodulos
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idmodulos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idmodulos),
        ]);
    }

    /**
     * Creates a new modulos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new modulos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idmodulos' => $model->idmodulos]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing modulos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idmodulos Idmodulos
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idmodulos)
    {
        $model = $this->findModel($idmodulos);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idmodulos' => $model->idmodulos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing modulos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idmodulos Idmodulos
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idmodulos)
    {
        $this->findModel($idmodulos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the modulos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idmodulos Idmodulos
     * @return modulos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idmodulos)
    {
        if (($model = modulos::findOne(['idmodulos' => $idmodulos])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
