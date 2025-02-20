<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\juegos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="juegos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Ej: Dungeons & Dragons']) ?>

    <?= $form->field($model, 'tematica')->textInput(['maxlength' => true, 'placeholder' => 'Ej: Ciencia ficción']) ?>

    <?= $form->field($model, 'edicion')->textInput(['maxlength' => true, 'placeholder' => 'Ej: 5e']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
