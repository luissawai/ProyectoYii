<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\jugadores $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jugadores-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa tu nombre']) ?>

        <?= $form->field($model, 'rol')->dropDownList(
            ['jugador' => 'Jugador', 'master' => 'Master', 'NPC' => 'NPC'],
            ['prompt' => 'Selecciona un rol'] // 'prompt' es la opción correcta
        ) ?>
        
        <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
        
        <?php ActiveForm::end(); ?>
</div>
