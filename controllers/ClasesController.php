<?php

namespace app\controllers;

use app\models\clases;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClasesController implements the CRUD actions for clases model.
 */
class ClasesController extends Controller
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
     * Lists all clases models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => clases::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idpersonajes' => SORT_DESC,
                    'clases' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single clases model.
     * @param int $idpersonajes Idpersonajes
     * @param string $clases Clases
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idpersonajes, $clases)
    {
        return $this->render('view', [
            'model' => $this->findModel($idpersonajes, $clases),
        ]);
    }

    /**
     * Creates a new clases model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new clases();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idpersonajes' => $model->idpersonajes, 'clases' => $model->clases]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing clases model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idpersonajes Idpersonajes
     * @param string $clases Clases
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idpersonajes, $clases)
    {
        $model = $this->findModel($idpersonajes, $clases);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpersonajes' => $model->idpersonajes, 'clases' => $model->clases]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing clases model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idpersonajes Idpersonajes
     * @param string $clases Clases
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idpersonajes, $clases)
    {
        $this->findModel($idpersonajes, $clases)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the clases model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idpersonajes Idpersonajes
     * @param string $clases Clases
     * @return clases the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idpersonajes, $clases)
    {
        if (($model = clases::findOne(['idpersonajes' => $idpersonajes, 'clases' => $clases])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
