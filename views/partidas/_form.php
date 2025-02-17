<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\partidas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="partidas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idjuegos')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechainicio')->textInput() ?>

    <?= $form->field($model, 'fechafin')->textInput() ?>

    <?= $form->field($model, 'nombre_equipo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
