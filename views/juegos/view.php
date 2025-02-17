<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\juegos $model */

$this->title = $model->idjuegos;
$this->params['breadcrumbs'][] = ['label' => 'Juegos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="juegos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idjuegos' => $model->idjuegos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idjuegos' => $model->idjuegos], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idjuegos',
            'nombre',
            'tematica',
            'edicion',
        ],
    ]) ?>

</div>
