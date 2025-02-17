<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\modulos $model */

$this->title = $model->idmodulos;
$this->params['breadcrumbs'][] = ['label' => 'Modulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="modulos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idmodulos' => $model->idmodulos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idmodulos' => $model->idmodulos], [
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
            'idmodulos',
            'idjuegos',
            'nombre',
            'edicion',
        ],
    ]) ?>

</div>
