<?php

namespace app\controllers;

use app\models\Juegan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\IntegrityException;
use Yii;

/**
 * JueganController implements the CRUD actions for Juegan model.
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
     * Lists all Juegan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Juegan::find(),
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
     * Displays a single Juegan model.
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
     * Creates a new Juegan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Juegan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                try {
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Registro creado exitosamente.');
                        return $this->redirect(['view', 'idjuegan' => $model->idjuegan]);
                    } else {
                        Yii::$app->session->setFlash('error', 'Error al guardar el registro.');
                    }
                } catch (IntegrityException $e) {
                    // Captura la excepción de violación de integridad (duplicado)
                    Yii::$app->session->setFlash('error', 'El registro ya existe. Por favor, intente con valores diferentes.');
                } catch (\Exception $e) {
                    // Captura cualquier otra excepción
                    Yii::$app->session->setFlash('error', 'Ocurrió un error inesperado. Por favor, intente nuevamente.');
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Juegan model.
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
     * Deletes an existing Juegan model.
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
     * Finds the Juegan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idjuegan Idjuegan
     * @return Juegan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idjuegan)
    {
        if (($model = Juegan::findOne(['idjuegan' => $idjuegan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
