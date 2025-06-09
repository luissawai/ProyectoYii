<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Juegos;
?>

<style>
body {
    background-color: #2e2e2e;
    color: #ffffff;
}

label {
    font-size: 1.1rem;
    color: #e0e0e0;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.form-control {
    background-color: #3a3a3a;
    border: 1px solid #555;
    border-radius: 0.5rem;
    color: #ffffff;
    padding: 0.8rem 1rem;
    font-size: 1.2rem;
    width: 100%;
    height: 3.2rem;
    line-height: 1.4;
    transition: background-color 0.3s ease;
}

.form-control:focus {
    background-color: #555;
    border-color: #e91e63;
    box-shadow: 0 0 5px rgba(233, 30, 99, 0.8);
    color: #ffffff;
}

.form-control::placeholder {
    color: #bbbbbb;
}

.form-group {
    margin-bottom: 2rem;
}

.form-control option {
    background-color: #3a3a3a;
    color: #ffffff;
    font-size: 1rem;
}

select.form-control {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    padding-right: 2.5rem;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23ffffff' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.058 2.305 4 3.204 4h9.592c.9 0 1.319 1.058.753 1.658L8.753 11.14a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 1rem;
}

.botones-separados {
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    margin-top: 2rem;
}

.btn-guardar {
    background-color: #e91e63;
    color: white;
    font-weight: 600;
    padding: 1.2rem 2.7rem;
    border-radius: 1rem;
    font-size: 1.2rem;
    border: none;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
}

.btn-guardar:hover {
    background-color: #c2185b;
    transform: scale(1.05);
}

.btn-atras {
    background-color: #4caf50;
    color: white;
    font-weight: 600;
    padding: 1.2rem 2.7rem;
    border-radius: 1rem;
    font-size: 1.2rem;
    border: none;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
}

.btn-atras:hover {
    background-color: #388e3c;
    transform: scale(1.05);
}
</style>

<div class="modulos-form">

    <?php $form = ActiveForm::begin(['id' => 'form-modulos']); ?>

    <?= $form->field($model, 'idjuegos')->dropDownList(
        ArrayHelper::map(\app\models\Juegos::find()->all(), 'idjuegos', 'nombre'),
        ['prompt' => 'Seleccione un juego', 'class' => 'form-control']
    ) ?>

    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el nombre del módulo',
        'class' => 'form-control'
    ]) ?>

    <?= $form->field($model, 'edicion')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese la edición del módulo',
        'class' => 'form-control'
    ]) ?>

    <div class="form-group botones-separados">
        <?= Html::submitButton('💾 Guardar', ['class' => 'btn-guardar']) ?>
        <?= Html::button('◁ Volver atrás', ['class' => 'btn-atras', 'type' => 'button', 'id' => 'btn-volver']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<JS
(function () {
    let formHasChanged = false;
    const form = document.getElementById('form-modulos');
    const saveButton = document.querySelector('.btn-guardar');
    const backButton = document.getElementById('btn-volver');

    if (!form || !saveButton || !backButton) return;

    form.querySelectorAll('input, textarea, select').forEach(el => {
        el.addEventListener('input', () => {
            formHasChanged = true;
        });
    });

    saveButton.addEventListener('click', () => {
        formHasChanged = false;
    });

    window.addEventListener('beforeunload', (e) => {
        if (formHasChanged) {
            e.preventDefault();
            e.returnValue = '¿Seguro que quiere salir? Los cambios no se guardarán.';
        }
    });

    backButton.addEventListener('click', (e) => {
        if (formHasChanged) {
            const confirmLeave = confirm('¿Seguro que quiere volver atrás? No se guardarán los cambios.');
            if (!confirmLeave) {
                e.preventDefault();
                return;
            }
        }
        window.history.back();
    });
})();
JS;

$this->registerJs($js, \yii\web\View::POS_END);
?>

