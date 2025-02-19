<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Jugadores;

/** @var yii\web\View $this */
/** @var app\models\Personajes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="personajes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idjugadores')->dropDownList(
            ArrayHelper::map(Jugadores::find()->all(), 'idjugadores', 'nombre'),
            ['prompt' => 'Selecciona un Jugador'] // 'prompt' es la opción correcta
        ) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'master')->dropDownList(
            [0 => 'No', 1 => 'Sí'], // Opciones para campo booleano
            ['prompt' => 'Selecciona si es master']
        ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
