<?php   

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Jugadores;

/** @var yii\web\View $this */
/** @var app\models\Personajes $model */
/** @var yii\widgets\ActiveForm $form */
/** @var bool $mostrarVolver */
?>

<div class="personajes-form">

    <?php $form = ActiveForm::begin(['id' => 'form-personajes']); ?>

    <?= $form->field($model, 'idjugadores')->dropDownList(
        ArrayHelper::map(Jugadores::find()->all(), 'idjugadores', 'nombre'),
        [
            'prompt' => 'Selecciona un jugador',
            'class' => 'form-control'
        ]
    ) ?>

    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ejemplo: Félix portador de opiaceos',
        'class' => 'form-control'
    ]) ?>

    <?= $form->field($model, 'master')->radioList(
        [1 => 'Sí', 0 => 'No'],
        [
            'item' => function($index, $label, $name, $checked, $value) {
                $id = $name . '-' . $index;
                return '<label for="'. $id .'" class="radio-btn '. ($checked ? 'selected' : '') .'">' .
                    Html::radio($name, $checked, ['value' => $value, 'id' => $id, 'class' => 'radio-input']) .
                    ' ' . $label .
                    '</label>';
            }
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

/* Aumentar un poco el tamaño y peso de la etiqueta "¿Es master?" */
.field-personajes-master > label {
    font-size: 1.3rem;
    font-weight: 700;
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

/* Radio button styles customizados */
.radio-btn {
    display: inline-flex;
    align-items: center;
    background-color: #444; /* gris oscuro */
    border: 1.5px solid transparent;
    border-radius: 0.8rem;
    padding: 0.4rem 1.2rem;
    margin-right: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    font-weight: 600;
    color: #ddd;
    user-select: none;
    box-shadow: none;
}

.radio-btn:hover {
    background-color: #555; /* un poco más claro */
}

.radio-input {
    margin-right: 0.6rem;
    cursor: pointer;
}

.radio-btn.selected {
    background: linear-gradient(135deg, #e91e63, #c2185b); /* rojo del botón Actualizar */
    border-color: #c2185b;
    color: #ffe6e6;
    box-shadow: 0 0 8px 2px rgba(233, 30, 99, 0.6);
}
</style>

<?php
$script = <<<JS
(function () {
    const form = document.getElementById('form-personajes');
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

    // Actualizar clase selected cuando se cambia radio
    const radios = form.querySelectorAll('.radio-input');
    radios.forEach(radio => {
        radio.addEventListener('change', (e) => {
            radios.forEach(r => r.parentElement.classList.remove('selected'));
            e.target.parentElement.classList.add('selected');
        });
    });

})();
JS;

$this->registerJs($script, yii\web\View::POS_END);
?>








