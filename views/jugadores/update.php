<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\jugadores $model */

$this->title = 'Update Jugadores: ' . $model->idjugadores;
$this->params['breadcrumbs'][] = ['label' => 'Jugadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjugadores, 'url' => ['view', 'idjugadores' => $model->idjugadores]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jugadores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
