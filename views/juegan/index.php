<?php

use app\models\juegan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Juegans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="juegan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Juegan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idjuegan',
            'idpartidas',
            'idjugadores',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, juegan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idjuegan' => $model->idjuegan]);
                 }
            ],
        ],
    ]); ?>


</div>
