<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Juegos;

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

    <div class="form-group" style="display: flex; justify-content: space-between; gap: 1rem; margin-top: 2rem;">
        <?= Html::submitButton('💾 Guardar', ['class' => 'btn-guardar']) ?>
        <?= Html::button('◁ Volver atrás', [
            'class' => 'btn-atras',
            'onclick' => 'window.history.back();'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

<<<<<<< HEAD
<<<<<<< HEAD
</div>
=======
</div>
>>>>>>> 57af4fdcde6c3bd0475cc01ac4bc873755458fb8
=======
</div>

>>>>>>> aefa31f619207f38d018cf01a0f29acf8ad43d69
