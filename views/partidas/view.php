<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\partidas $model */

$this->title = $model->idpartidas;
$this->params['breadcrumbs'][] = ['label' => 'Partidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="partidas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idpartidas' => $model->idpartidas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idpartidas' => $model->idpartidas], [
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
            'idpartidas',
            'idjuegos',
            'nombre',
            'fechainicio',
            'fechafin',
            'nombre_equipo',
        ],
    ]) ?>

</div>
