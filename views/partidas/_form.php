<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Juegos;

/** @var yii\web\View $this */
/** @var app\models\Partidas $model */
/** @var yii\widgets\ActiveForm $form */

// Obtener la lista de juegos (id y nombre)
$juegos = ArrayHelper::map(Juegos::find()->all(), 'idjuegos', 'nombre');

?>

<div class="partidas-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- DropDownList para seleccionar el nombre del juego -->
    <?= $form->field($model, 'idjuegos')->dropDownList(
        $juegos,
        ['prompt' => 'Seleccione un juego'] // Prompt para la opción por defecto
    )->label('Nombre del Juego') ?> <!-- Cambiar la etiqueta a 'Nombre del Juego' -->

    <!-- Campo para nombre de la partida -->
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese el nombre de la partida']) ?>

    <!-- Campo para la fecha de inicio -->
    <?= $form->field($model, 'fechainicio')->textInput(['type' => 'date']) ?>

    <!-- Campo para la fecha de finalización -->
    <?= $form->field($model, 'fechafin')->textInput(['type' => 'date']) ?>

    <!-- Campo para el nombre del equipo -->
    <?= $form->field($model, 'nombre_equipo')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese el nombre del equipo']) ?>

    <!-- Botón de envío del formulario -->
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>







