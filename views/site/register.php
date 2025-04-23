<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Registro';
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 bg-white rounded register-card" style="width: 100%; max-width: 450px;">
        <div class="card-body p-3">
            <h3 class="text-center mb-4"><?= Html::encode($this->title) ?></h3>
            <p class="text-center text-muted mb-4">Por favor complete los siguientes campos para registrarse:</p>

            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'fieldConfig' => [
                    'template' => "<div class='form-group mb-4'>{label}{input}{error}</div>",
                    'labelOptions' => ['class' => 'form-label mb-2'],
                    'inputOptions' => ['class' => 'form-control'],
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
                <p class="mb-0">¿Ya tienes una cuenta? <?= Html::a('Inicia sesión aquí', ['site/login'], ['class' => 'login-link']) ?></p>
            </div>
        </div>
    </div>
</div>

<style>
/* Estilos generales */
body {
    background-color: #EADDC4;
    font-family: 'Poppins', sans-serif;
    color: #3B2B2B;
}

/* Tarjeta de registro */
.register-card {
    border: 2px solid #8B3A3A;
    background-color: #F5F0E6;
}

/* Contenedor de campos */
.form-field {
    width: 100%;
    margin-bottom: 1.5rem;
}

/* Campos de formulario */
.input-field {
    background-color: #fff;
    border: 1px solid #C1A15A;
    color: #3B2B2B;
    padding: 12px 15px;
    border-radius: 8px;
    height: 50px;
    width: 100%;
    transition: all 0.3s;
}

.main > .container{
    padding: 25px !important;
}

.input-field::placeholder {
    color: #888;
    opacity: 1;
}

.input-field:focus {
    border-color: #8B3A3A;
    box-shadow: 0 0 0 3px rgba(139, 58, 58, 0.2);
    outline: none;
}

/* Etiquetas */
.form-label {
    display: block;
    color: #3B2B2B;
    font-weight: 500;
    margin-bottom: 8px;
    text-align: left;
    width: 100%;
}

/* Botón de registro */
.btn-register {
    background-color: #8B3A3A;
    color: white;
    border: none;
    font-weight: 600;
    border-radius: 8px;
    transition: background-color 0.3s;
    font-size: 1rem;
}

.btn-register:hover {
    background-color: #752f2f;
    color: white;
}

/* Enlace de login */
.login-link {
    color: #8B3A3A;
    font-weight: 500;
    text-decoration: none;
}

.login-link:hover {
    text-decoration: underline;
    color: #752f2f;
}

/* Mensajes de error */
.invalid-feedback {
    color: #8B3A3A;
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