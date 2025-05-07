<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Iniciar Sesión';
?>

<div class="login-container">
    <h3 class="login-title text-center"><?= Html::encode($this->title) ?></h3>
    <p class="text-center text-muted mb-4">Por favor ingrese sus credenciales para acceder:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'login-form']
    ]); ?>

    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']) ?>

    <div class="form-group">
        <?= $form->field($model, 'username')->textInput([
            'autofocus' => true,
            'placeholder' => 'Nombre de usuario',
            'class' => 'form-control login-input'
        ])->label(false) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'password')->passwordInput([
            'placeholder' => 'Contraseña',
            'class' => 'form-control login-input'
        ])->label(false) ?>
    </div>

    <div class="form-options d-flex justify-content-between mb-4">
        <div class="remember-me-container">
            <?= $form->field($model, 'rememberMe')->checkbox([
                'class' => 'form-check-input',
                'labelOptions' => ['class' => 'remember-me-label']
            ])->label('Recuérdame') ?>
        </div>
        <div class="forgot-password-container">
            <?= Html::a('¿Olvidaste tu contraseña?', ['site/request-password-reset'], ['class' => 'forgot-password']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Iniciar Sesión', [
            'class' => 'btn btn-purple btn-block login-button'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <p class="register-link text-center">¿No tienes una cuenta? <?= Html::a('Regístrate aquí', ['site/register'], ['class' => 'register-link-text']) ?></p>
</div>
<style>
/* Contenedor del login */
.login-container {
    background-color:rgb(31, 21, 34); /* Fondo oscuro */
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    width: 100%;
    max-width: 400px;
    margin: 80px auto; /* Centrar vertical y horizontalmente */
    color: white;
}

/* Título del login */
.login-title {
    font-size: 1.8rem;
    font-weight: bold;
    color: #C1A15A; /* Dorado */
    margin-bottom: 20px;
}

/* Inputs del formulario */
.login-input {
    background-color: #17152d; /* Fondo oscuro para los inputs */
    border: 1px solid #5a189a; /* Borde morado oscuro */
    color: white;
    border-radius: 5px;
    padding: 10px;
}

.login-input::placeholder {
    color: #aaa; /* Color del texto placeholder */
}

/* Botón de inicio de sesión */
.login-button {
    background-color: #5a189a; /* Morado oscuro */
    border: none;
    border-radius: 10px;
    padding: 12px;
    font-weight: 600;
    font-size: 16px;
    color: #fff;
    transition: background-color 0.3s ease;
}

.login-button:hover {
    background-color: #3c096c; /* Morado más oscuro */
}

/* Enlaces */
.forgot-password, .register-link-text {
    color: #C1A15A; /* Dorado */
    text-decoration: none;
}

.forgot-password:hover, .register-link-text:hover {
    text-decoration: underline;
}

/* Checkbox */
.remember-me-label {
    color: white;
    font-size: 0.9rem;
}

/* Mensajes de error */
.alert-danger {
    background-color: #8b3a3a; /* Rojo oscuro */
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 20px;
}
</style>