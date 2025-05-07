<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Registro';
?>

<div class="register-container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 rounded register-card" style="width: 100%; max-width: 450px;">
        <div class="card-body p-3">
            <h3 class="text-center mb-4 text-white"><?= Html::encode($this->title) ?></h3>
            <p class="text-center text-muted mb-4">Por favor complete los siguientes campos para registrarse:</p>

            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'fieldConfig' => [
                    'template' => "<div class='form-group mb-4'>{label}{input}{error}</div>",
                    'labelOptions' => ['class' => 'form-label mb-2 text-white'],
                    'inputOptions' => ['class' => 'form-control input-field'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ],
            ]); ?>

            <div class="form-field">
                <?= $form->field($model, 'username')->textInput([
                    'placeholder' => 'Ingrese su nombre de usuario',
                    'class' => 'form-control input-field'
                ]) ?>
            </div>

            <div class="form-field">
                <?= $form->field($model, 'email')->input('email', [
                    'placeholder' => 'Ingrese su correo electrónico',
                    'class' => 'form-control input-field'
                ]) ?>
            </div>

            <div class="form-field">
                <?= $form->field($model, 'password')->passwordInput([
                    'placeholder' => 'Ingrese su contraseña',
                    'class' => 'form-control input-field'
                ]) ?>
            </div>

            <div class="d-grid mt-4">
                <?= Html::submitButton('Registrarse', [
                    'class' => 'btn btn-register btn-block py-2',
                    'name' => 'register-button'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="text-center mt-4 pt-3">
                <p class="mb-0 text-white">¿Ya tienes una cuenta? <?= Html::a('Inicia sesión aquí', ['site/login'], ['class' => 'login-link']) ?></p>
            </div>
        </div>
    </div>
</div>

<style>
/* Contenedor del registro */
.register-container {
    padding: 40px;
    min-height: 100vh;
}

/* Tarjeta de registro */
.register-card {
    border: 2px solid #5a189a; /* Borde morado oscuro */
    background-color:rgb(31, 21, 34); /* Fondo oscuro */
    color: white;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

/* Campos de formulario */
.input-field {
    background-color: #1e1e2f; /* Fondo oscuro para los inputs */
    border: 1px solid #5a189a; /* Borde morado oscuro */
    color: white;
    padding: 12px 15px;
    border-radius: 8px;
    height: 50px;
    width: 100%;
    transition: all 0.3s;
}

.input-field::placeholder {
    color: #aaa; /* Color del texto placeholder */
}

.input-field:focus {
    border-color: #8b3a3a; /* Borde rojo oscuro al enfocar */
    box-shadow: 0 0 0 3px rgba(139, 58, 58, 0.2);
    outline: none;
}

/* Etiquetas */
.form-label {
    display: block;
    color: white;
    font-weight: 500;
    margin-bottom: 8px;
    text-align: left;
    width: 100%;
}

/* Botón de registro */
.btn-register {
    background-color: #5a189a; /* Morado oscuro */
    color: white;
    border: none;
    font-weight: 600;
    border-radius: 8px;
    transition: background-color 0.3s;
    font-size: 1rem;
}

.btn-register:hover {
    background-color: #3c096c; /* Morado más oscuro */
    color: white;
}

/* Enlace de login */
.login-link {
    color: #C1A15A; /* Dorado */
    font-weight: 500;
    text-decoration: none;
}

.login-link:hover {
    text-decoration: underline;
    color: #8b3a3a; /* Rojo oscuro */
}

/* Mensajes de error */
.invalid-feedback {
    color: #8b3a3a; /* Rojo oscuro */
    font-size: 0.875em;
    margin-top: 5px;
    text-align: left;
}

/* Responsive */
@media (max-width: 576px) {
    .register-card {
        width: 95% !important;
        padding: 20px !important;
    }
    
    .input-field {
        height: 45px;
        padding: 10px 15px;
    }
    
    .form-label {
        font-size: 0.9rem;
    }
}
</style>