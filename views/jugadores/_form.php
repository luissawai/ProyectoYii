<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\jugadores $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jugadores-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Agregar clase 'form-control' al campo nombre -->
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa tu nombre', 'class' => 'form-control']) ?>

    <!-- Agregar clase 'form-control' al campo rol -->
    <?= $form->field($model, 'rol')->dropDownList(
        ['jugador' => 'Jugador', 'master' => 'Master', 'NPC' => 'NPC'],
        ['prompt' => 'Selecciona un rol', 'class' => 'form-control'] // 'prompt' es la opción correcta
    ) ?>

    <div class="form-group" style="text-align: center;">
        <!-- Asegurarte de que el botón tenga la clase adecuada -->
        <?= Html::submitButton('💾 Guardar', ['class' => 'btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

