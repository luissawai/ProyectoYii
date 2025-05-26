<?php  
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Partidas $model */

$this->title = 'Actualizar Partida: ' . $model->idpartidas;
?>

<style>
    body {
        background-color: #2e2e2e;
        color: #ffffff;
    }

    .partidas-update {
        background-color: #2c2c2c;
        padding: 3rem;
        border-radius: 1rem;
        max-width: 800px;
        margin: 4rem auto;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
    }

    .partidas-update h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #ffffff;
        text-align: center;
        margin-bottom: 2rem;
    }

    /* Estilo de los botones */
    .btn-guardar, .btn-atras {
        display: inline-block;
        text-align: center;
        text-decoration: none;
        border: none;
        font-size: 1.1rem;
        cursor: pointer;
        padding: 1rem 2rem;
        border-radius: 1rem;
        font-weight: 600;
        margin-top: 1.5rem;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn-guardar {
        background-color: #e91e63;
        color: white;
    }

    .btn-guardar:hover {
        background-color: #c2185b;
        transform: scale(1.05);
        color: white;
        text-decoration: none;
    }

    .btn-atras {
        background-color: #4caf50;
        color: white;
        margin-left: 1rem;
    }

    .btn-atras:hover {
        background-color: #388e3c;
        transform: scale(1.05);
        color: white;
        text-decoration: none;
    }

    /* Estilos del formulario */
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

    input[type="date"] {
        background-color: #3a3a3a;
        border: 1px solid #555;
        border-radius: 0.5rem;
        color: #ffffff;
        padding: 0.8rem 1rem;
        font-size: 1rem;
        width: 100%;
        transition: background-color 0.3s ease;
        height: 3.2rem;
    }

    input[type="date"]:focus {
        background-color: #555;
        border-color: #e91e63;
        box-shadow: 0 0 5px rgba(233, 30, 99, 0.8);
        color: #ffffff;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1) brightness(2);
        border: none;
        background-color: transparent;
    }

    input[type="date"]::-moz-calendar-picker-indicator {
        filter: invert(1) brightness(2);
    }

    input[type="date"]::-ms-calendar-picker-indicator {
        filter: invert(1) brightness(2);
    }
</style>

<div class="partidas-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    echo $this->render('_form', [
        'model' => $model,
    ]);
    ?>

  </div>

