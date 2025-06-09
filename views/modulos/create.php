<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\modulos $model */

$this->title = 'Crear Módulo';

?>
<style>
    body {
        background-color: #2e2e2e;
        color: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .modulos-create {
        background-color: #2c2c2c;
        padding: 2.5rem 3rem;
        border-radius: 1rem;
        max-width: 700px;
        margin: 4rem auto;
        box-shadow: 0 8px 30px rgba(0,0,0,0.6);
    }
    .modulos-create h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #ffffff;
        text-align: center;
        margin-bottom: 2rem;
    }
</style>

<div class="modulos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

