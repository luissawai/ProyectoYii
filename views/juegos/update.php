<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\juegos $model */

$this->title = 'Editar Juego: ' . $model->nombre;
?>

<style>
    body {
        background-color: #2e2e2e;
        color: #ffffff;
    }

    .juegos-update {
        background-color: #2c2c2c;
        padding: 3rem;
        border-radius: 1rem;
        max-width: 800px;
        margin: 4rem auto;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
    }

    .juegos-update h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #ffffff;
        text-align: center;
        margin-bottom: 2rem;
    }
</style>

<div class="juegos-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

