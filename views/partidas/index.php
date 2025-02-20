<?php

use app\models\partidas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Partidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partidas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Partidas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // Aquí mostramos el nombre del juego en lugar del idjuegos
            [
                'attribute' => 'idjuegos', 
                'label' => 'Nombre del Juego', // Nombre para la columna
                'value' => function($model) {
                    return $model->juego->nombre; // Usamos la relación para obtener el nombre del juego
                },
            ],
            'nombre',
            'fechainicio',
            'fechafin',
            'nombre_equipo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, partidas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idpartidas' => $model->idpartidas]);
                }
            ],
        ],
    ]); ?>

</div>

