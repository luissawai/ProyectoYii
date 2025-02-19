<?php

use app\models\Personajes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Personajes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personajes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Personajes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'idpersonajes',
            [
                'attribute' => 'jugadorNombre',
                'label' => 'Nombre del Jugador',
                'value' => function($model) {
                    return $model->jugador->nombre;
                },
            ],
            'nombre',
            'master',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Personajes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idpersonajes' => $model->idpersonajes]);
                 }
            ],
        ],
    ]); ?>
</div>
