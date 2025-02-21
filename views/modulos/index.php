<?php

use app\models\Modulos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Modulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Modulos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'idjuegos',
                'value' => function ($model) {
                    return $model->juego ? $model->juego->nombre : '(Sin juego)';
                },
                'label' => 'Nombre del juego',
            ],
            'nombre',
            'edicion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Modulos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idmodulos' => $model->idmodulos]);
                }
            ],
        ],
    ]); ?>

</div>
