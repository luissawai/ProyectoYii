<?php

use app\models\juegos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Juegos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="juegos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Juegos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idjuegos',
            'nombre',
            'tematica',
            'edicion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, juegos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idjuegos' => $model->idjuegos]);
                 }
            ],
        ],
    ]); ?>


</div>
