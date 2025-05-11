<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\jugadores $model */

$this->title = 'Crea tu jugador';
?>
<style>
    body {
        background-color: #2e2e2e;
        color: #ffffff;
    }

    .jugadores-create {
        background-color: #2c2c2c;
        padding: 3rem;
        border-radius: 1rem;
        max-width: 800px;
        margin: 4rem auto;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
    }

    .jugadores-create h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #ffffff;
        text-align: center;
        margin-bottom: 2rem;
    }

    .jugadores-create .btn {
        background-color: #e91e63;
        color: white;
        font-weight: 600;
        padding: 1rem 2rem;
        border-radius: 1rem;
        margin-top: 1.5rem;
        transition: background 0.3s ease, transform 0.2s ease;
        text-decoration: none;
        font-size: 1.1rem;
        border: none;
        cursor: pointer;
    }

    .jugadores-create .btn:hover {
        background-color: #c2185b;
        transform: scale(1.05);
    }

    .form-control {
        background-color: #3a3a3a;
        border: 1px solid #555;
        border-radius: 0.5rem;
        color: #ffffff;
        padding: 0.8rem 1rem; /* Ajustamos el padding para todos los campos */
        font-size: 1rem;
        width: 100%;
        transition: background-color 0.3s ease;
        height: 3.2rem; /* Igualamos la altura de los campos */
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

    /* Estilo específico para el select del campo rol */
    select.form-control {
        background-color: #3a3a3a;
        color: #ffffff;
        border: 1px solid #555;
        font-size: 1.1rem;
        padding: 0.8rem 1rem;
        border-radius: 0.5rem;
        width: 100%;
        height: 3.2rem; /* Igualamos la altura del select */
        line-height: 1.4;
        /* 👇 Línea eliminada: appearance: none; */
    }

    select.form-control option {
        background-color: #3a3a3a;
        color: #ffffff;
        padding: 0.8rem;
    }

    select.form-control option:hover {
        background-color: #555;
    }

    select.form-control:focus {
        background-color: #555;
        border-color: #e91e63;
        box-shadow: 0 0 5px rgba(233, 30, 99, 0.8);
        color: #ffffff;
    }

    .form-group {
        margin-bottom: 2rem;
    }
</style>

<div class="jugadores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
