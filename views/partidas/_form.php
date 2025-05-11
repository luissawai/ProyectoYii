<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Juegos;

/** @var yii\web\View $this */
/** @var app\models\Partidas $model */
/** @var yii\widgets\ActiveForm $form */

$juegos = ArrayHelper::map(Juegos::find()->all(), 'idjuegos', 'nombre');
?>

<div class="partidas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idjuegos')->dropDownList(
        $juegos,
        ['prompt' => 'Seleccione un juego', 'class' => 'form-control']
    )->label('Nombre del Juego') ?>

    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el nombre de la partida',
        'class' => 'form-control'
    ]) ?>

    <?= $form->field($model, 'fechainicio')->textInput([
        'id' => 'fecha-inicio',
        'class' => 'form-control',
        'placeholder' => 'Seleccione la fecha de inicio'
    ]) ?>

    <?= $form->field($model, 'fechafin')->textInput([
        'id' => 'fecha-fin',
        'class' => 'form-control',
        'placeholder' => 'Seleccione la fecha de fin'
    ]) ?>

    <?= $form->field($model, 'nombre_equipo')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el nombre del equipo',
        'class' => 'form-control'
    ]) ?>

    <div class="form-group d-flex justify-content-between">
        <?= Html::submitButton('💾 Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('◁ Volver atrás', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>