<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\clases $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clases-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idpersonajes')->textInput() ?>

    <?= $form->field($model, 'clases')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
