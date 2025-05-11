<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\jugadores $model */

$this->title = 'Actualizar Jugador: ' . $model->idjugadores;


?>
<style>
    body {
        background-color: #2e2e2e;
        color: #ffffff;
    }

    .jugadores-update {
        background-color: #2c2c2c;
        padding: 3rem;
        border-radius: 1rem;
        max-width: 800px;
        margin: 4rem auto;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
    }

    .jugadores-update h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #ffffff;
        text-align: center;
        margin-bottom: 2rem;
    }

    .btn-guardar {
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

.btn-guardar:hover {
    background-color: #c2185b;
    transform: scale(1.05);
}


    .jugadores-update .btn:hover {
        background-color: #c2185b;
        transform: scale(1.05);
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
        height: 3.2rem; /* Aseguramos que ambos campos tengan la misma altura */
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

    /* Estilo para el select del campo rol */
    select.form-control {
        background-color: #3a3a3a;
        color: #ffffff;
        border: 1px solid #555;
        font-size: 1.1rem;
        padding: 0.8rem 1rem;
        border-radius: 0.5rem;
        width: 100%;
        height: 3.2rem; /* Aseguramos que el select tenga la misma altura que el campo de texto */
        position: relative;
    }

    /* Estilo para las opciones del select */
    select.form-control option {
        background-color: #3a3a3a;
        color: #ffffff;
        padding: 0.8rem;
    }

    select.form-control option:hover {
        background-color: #555;
    }

    /* Estilo para la flecha personalizada */
    select.form-control::-ms-expand {
        display: none; /* Para navegadores de IE */
    }

    select.form-control::after {
        content: " ▼";
        font-size: 1.2rem;
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .form-group {
        margin-bottom: 2rem;
    }
</style>

<div class="jugadores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa tu nombre']) ?>

    <?= $form->field($model, 'rol')->dropDownList(
        ['jugador' => 'Jugador', 'master' => 'Master', 'NPC' => 'NPC'],
        ['prompt' => 'Selecciona un rol']
    ) ?>

    <div class="form-group" style="text-align: center;">
        <?= Html::submitButton('💾 Actualizar', ['class' => 'btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
