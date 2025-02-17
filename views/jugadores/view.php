<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\jugadores $model */

$this->title = $model->idjugadores;
$this->params['breadcrumbs'][] = ['label' => 'Jugadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jugadores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idjugadores' => $model->idjugadores], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idjugadores' => $model->idjugadores], [
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
            'idjugadores',
            'nombre',
            'rol',
        ],
    ]) ?>

</div>
