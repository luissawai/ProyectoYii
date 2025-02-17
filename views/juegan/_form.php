<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\juegan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="juegan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idpartidas')->textInput() ?>

    <?= $form->field($model, 'idjugadores')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
