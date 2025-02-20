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
        ['prompt' => 'Selecciona un Jugador'] // Corregido para seleccionar un jugador
    ) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Ejemplo: Félix portador de opiaceos']) ?>

    <?= $form->field($model, 'master')->radioList([
        1 => 'Sí',
        0 => 'No',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>





