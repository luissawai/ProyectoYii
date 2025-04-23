<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Iniciar Sesión';
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-container">
    <h3 class="login-title"><?= Html::encode($this->title) ?></h3>
    <p class="text-center text-muted mb-4">Por favor ingrese sus credenciales para acceder:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'login-form']
    ]); ?>

    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']) ?>

    <div class="form-group">
        <div class="input-container">
            <?= $form->field($model, 'username')->textInput([
                'autofocus' => true,
                'placeholder' =>'Nombre de usuario',
                'class' => 'form-control'
            ])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="input-container">
            <?= $form->field($model, 'password')->passwordInput([
                'placeholder' =>'Contraseña',
                'class' => 'form-control'
            ])->label(false) ?>
        </div>
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
            'class' => 'btn btn-primary btn-block login-button'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <p class="register-link">¿No tienes una cuenta? <?= Html::a('Regístrate aquí', ['site/register'], ['class' => 'register-link-text']) ?></p>
</div>

<style>
/* Estilos generales */
body {
    background-color: #EADDC4;
    height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins', sans-serif;
    color: #3B2B2B;
}

/* Contenedor principal */
.login-container {
    background-color: #F5F0E6;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    width: 100%;
    max-width: 420px;
    margin: 20px;
    border: 2px solid #8B3A3A;
}

/* Título */
.login-title {
    color: #8B3A3A;
    font-weight: 700;
    margin-bottom: 20px;
    font-size: 26px;
    text-align: center;
    font-family: 'Georgia', serif;
}

/* Campos de entrada */
.input-container {
    position: relative;
    margin-bottom: 5px;
}

.form-control {
    background-color: #fff;
    border: 1px solid #C1A15A;
    color: #3B2B2B;
    padding: 12px 12px;
    border-radius: 10px;
    height: 50px;
    width: 100%;
    font-size: 14px;
    transition: border-color 0.3s;
}

.form-control::placeholder {
    color: #888;
}

.form-control:focus {
    border-color: #8B3A3A;
    outline: none;
    box-shadow: 0 0 0 3px rgba(139, 58, 58, 0.2);
}

/* Iconos */
.input-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #C1A15A;
    font-size: 18px;
    z-index: 2;
}

/* Opciones adicionales */
.form-options {
    margin: 25px 0;
}

.remember-me-label {
    color: #3B2B2B;
    font-size: 14px;
    user-select: none;
    margin-left: 5px;
}

.form-check-input {
    margin-right: 8px;
    background-color: #fff;
    border: 1px solid #C1A15A;
}

.form-check-input:checked {
    background-color: #8B3A3A;
    border-color: #8B3A3A;
}

.forgot-password {
    color: #8B3A3A;
    font-size: 14px;
    text-decoration: none;
}

.forgot-password:hover {
    text-decoration: underline;
}

/* Botón de inicio de sesión */
.login-button {
    background-color: #8B3A3A;
    border: none;
    border-radius: 10px;
    padding: 12px;
    font-weight: 600;
    font-size: 16px;
    color: #fff;
    width: 100%;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

.login-button:hover {
    background-color: #752f2f;
}

/* Enlace de registro */
.register-link {
    color: #3B2B2B;
    text-align: center;
    margin-top: 25px;
    font-size: 14px;
}

.register-link-text {
    color: #8B3A3A;
    font-weight: 500;
    text-decoration: none;
}

.register-link-text:hover {
    text-decoration: underline;
}

/* Mensajes de error */
.alert-danger {
    background-color: rgba(139, 58, 58, 0.1);
    border-color: rgba(139, 58, 58, 0.2);
    color: #8B3A3A;
    border-radius: 10px;
    margin-bottom: 20px;
}

/* Estilos responsivos */
@media (max-width: 768px) {
    .login-container {
        padding: 30px 20px;
        margin: 10px;
    }

    .login-title {
        font-size: 22px;
    }

    .form-control {
        height: 45px;
        font-size: 13px;
        padding-left: 40px;
    }

    .input-icon {
        font-size: 16px;
        left: 12px;
    }

    .login-button {
        font-size: 15px;
    }

    .forgot-password,
    .remember-me-label {
        font-size: 13px;
    }

    .register-link {
        font-size: 13px;
    }
}
</style>