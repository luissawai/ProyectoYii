<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\juegos $model */

$this->title = 'Update Juegos: ' . $model->idjuegos;
$this->params['breadcrumbs'][] = ['label' => 'Juegos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjuegos, 'url' => ['view', 'idjuegos' => $model->idjuegos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="juegos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
