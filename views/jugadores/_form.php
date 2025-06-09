<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\jugadores $model */
/** @var yii\widgets\ActiveForm $form */
/** @var bool $mostrarVolver */
?>

<div class="jugadores-form">

    <?php $form = ActiveForm::begin(['id' => 'form-jugador']); ?>

    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingresa tu nombre',
        'class' => 'form-control'
    ]) ?>

    <?= $form->field($model, 'rol')->dropDownList(
        ['jugador' => 'Jugador', 'master' => 'Master', 'NPC' => 'NPC'],
        [
            'prompt' => 'Selecciona un rol',
            'class' => 'form-control'
        ]
    ) ?>

    <div class="form-group botones-separados">
        <?= Html::submitButton($model->isNewRecord ? '💾 Guardar' : '💾 Actualizar', ['class' => 'btn-guardar']) ?>

        <?php if (!empty($mostrarVolver) && $mostrarVolver): ?>
            <?= Html::button('◁ Volver atrás', [
                'class' => 'btn-atras',
                'type' => 'button',
                'id' => 'btn-volver'
            ]) ?>
        <?php endif; ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

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

<?php
$script = <<<JS
(function () {
    const form = document.getElementById('form-jugador');
    const volverBtn = document.getElementById('btn-volver');

    if (!form) return;

    let formChanged = false;

    form.querySelectorAll('input, select, textarea').forEach(el => {
        el.addEventListener('input', () => formChanged = true);
        el.addEventListener('change', () => formChanged = true);
    });

    window.addEventListener('beforeunload', function (e) {
        if (formChanged) {
            e.preventDefault();
            e.returnValue = '';
        }
    });

    form.addEventListener('submit', () => {
        formChanged = false;
    });

    if (volverBtn) {
        volverBtn.addEventListener('click', function () {
            if (formChanged) {
                const confirmar = confirm("Tienes cambios sin guardar. ¿Seguro que quieres salir?");
                if (confirmar) {
                    formChanged = false;
                    window.history.back();
                }
            } else {
                window.history.back();
            }
        });
    }
})();
JS;

$this->registerJs($script, yii\web\View::POS_END);
?>












