<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\clases $model */

$this->title = $model->idpersonajes;
$this->params['breadcrumbs'][] = ['label' => 'Clases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clases-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idpersonajes' => $model->idpersonajes, 'clases' => $model->clases], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idpersonajes' => $model->idpersonajes, 'clases' => $model->clases], [
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
            'idpersonajes',
            'clases',
        ],
    ]) ?>

</div>
