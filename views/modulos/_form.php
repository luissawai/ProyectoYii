<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Juegos;

/** @var yii\web\View $this */
/** @var app\models\Modulos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="modulos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idjuegos')->dropDownList(
        ArrayHelper::map(Juegos::find()->all(), 'idjuegos', 'nombre'),
        ['prompt' => 'Seleccione un juego']
    ) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edicion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
