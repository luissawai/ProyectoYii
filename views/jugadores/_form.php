<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\jugadores $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jugadores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingresa tu nombre',
        'class' => 'form-control'
    ]) ?>

    <?= $form->field($model, 'rol')->dropDownList(
        ['jugador' => 'Jugador', 'master' => 'Master', 'NPC' => 'NPC'],
        ['prompt' => 'Selecciona un rol', 'class' => 'form-control']
    ) ?>

    <div class="botones-separados">
        <?= Html::submitButton('💾 Guardar', ['class' => 'btn-guardar']) ?>
        <?= Html::button('◁ Volver atrás', ['class' => 'btn-atras', 'onclick' => 'window.history.back();']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<style>
    .botones-separados {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn-guardar {
        background-color: #e91e63;
        color: white;
        font-weight: 600;
        padding: 1rem 2rem;
        border-radius: 1rem;
        font-size: 1.1rem;
        border: none;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn-guardar:hover {
        background-color: #c2185b;
        transform: scale(1.05);
    }

    .btn-atras {
        background-color: #4caf50;
        color: white;
        font-weight: 600;
        padding: 1rem 2rem;
        border-radius: 1rem;
        font-size: 1.1rem;
        border: none;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn-atras:hover {
        background-color: #388e3c;
        transform: scale(1.05);
    }
</style>

