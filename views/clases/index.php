<?php

use app\models\clases;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clases-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clases', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'idpersonajes',
            'clases',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, clases $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idpersonajes' => $model->idpersonajes, 'clases' => $model->clases]);
                 }
            ],
        ],
    ]); ?>


</div>
