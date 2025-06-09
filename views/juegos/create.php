<?php 

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\juegos $model */

$this->title = 'Crear Juego';

?>

<style>
    body {
        background-color: #2e2e2e;
        color: #ffffff;
    }

    .juegos-create {
        background-color: #2c2c2c;
        padding: 3rem;
        border-radius: 1rem;
        max-width: 800px;
        margin: 4rem auto;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
    }

    .juegos-create h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #ffffff;
        text-align: center;
        margin-bottom: 2rem;
    }

    .btn-guardar, .btn-atras {
        display: inline-block;
        padding: 0.8rem 1.5rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 0.5rem;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        border: none;
    }

    .btn-guardar {
        background-color: #e91e63;
        color: #ffffff;
    }

    .btn-guardar:hover {
        background-color: #d81b60;
        transform: scale(1.05);
    }

    .btn-atras {
        background-color: #4CAF50;
        color: #ffffff;
    }

    .btn-atras:hover {
        background-color: #43a047;
        transform: scale(1.05);
    }

    .btn-atras,
    .btn-atras:visited,
    .btn-atras:hover,
    .btn-atras:active {
        text-decoration: none;
        color: #ffffff;
    }

    .form-control {
        background-color: #3a3a3a;
        border: 1px solid #555;
        border-radius: 0.5rem;
        color: #ffffff;
        padding: 0.8rem 1rem;
        font-size: 1rem;
        width: 100%;
        transition: background-color 0.3s ease;
        height: 3.2rem;
        line-height: 1.4;
    }

    .form-control:focus {
        background-color: #555;
        border-color: #e91e63;
        box-shadow: 0 0 5px rgba(233, 30, 99, 0.8);
        color: #ffffff;
    }

    label {
        font-size: 1.1rem;
        color: #e0e0e0;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .form-control::placeholder {
        color: #d0d0d0;
    }

    .form-group {
        margin-bottom: 2rem;
    }

    /* Evitar fondo blanco en campos readonly */
    .form-control[readonly] {
        background-color: #3a3a3a;
        color: #ffffff;
        cursor: pointer;
    }
</style>

<div class="juegos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

