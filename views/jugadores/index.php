<?php

use app\models\jugadores;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jugadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jugadores-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jugadores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idjugadores',
            'nombre',
            'rol',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, jugadores $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idjugadores' => $model->idjugadores]);
                 }
            ],
        ],
    ]); ?>


</div>
