<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\partidas $model */

$this->title = 'Update Partidas: ' . $model->idpartidas;
$this->params['breadcrumbs'][] = ['label' => 'Partidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpartidas, 'url' => ['view', 'idpartidas' => $model->idpartidas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="partidas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
