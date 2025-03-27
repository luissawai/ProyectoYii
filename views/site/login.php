<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-container">
    <h3 class="login-title"><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'login-form']
    ]); ?>

        <?= $form->errorSummary($model, ['class' => 'alert alert-danger']) ?>

        <div class="form-group">
            <div class="input-container">
                <span class="input-icon">👤</span>
                <?= $form->field($model, 'username')->textInput([
                    'autofocus' => true,
                    'placeholder' => 'Username',
                    'class' => 'form-control'
                ])->label(false) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="input-container">
                <span class="input-icon">🔒</span>
                <?= $form->field($model, 'password')->passwordInput([
                    'placeholder' => 'Password',
                    'class' => 'form-control'
                ])->label(false) ?>
            </div>
        </div>

        <div class="form-options d-flex justify-content-between align-items-center">
            <div class="remember-me-container">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'class' => 'form-check-input',
                    'labelOptions' => ['class' => 'form-check-label remember-me-label']
                ]) ?>
            </div>
            <a href="#" class="forgot-password">Forgot Password?</a>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Login', [
                'class' => 'btn btn-primary btn-block login-button'
            ]) ?>
        </div>

    <?php ActiveForm::end(); ?>

    <p class="register-link">Don't have an account? <?= Html::a('Create Account', ['site/register'], ['class' => 'register-link-text']) ?></p>
</div>

<style>
    /* Estilos generales */
    body {
        background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
        height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Poppins', sans-serif;
        color: white;
    }

    /* Contenedor principal */
    .login-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 420px;
        margin: 20px;
    }

    /* Título */
    .login-title {
        color: #fff;
        font-weight: 600;
        margin-bottom: 30px;
        font-size: 28px;
        text-align: center;
    }

    /* Campos de entrada */
    .input-container {
        position: relative;
        margin-bottom: 20px;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        padding: 12px 20px 12px 45px;
        border-radius: 25px;
        height: 50px;
        width: 100%;
        font-size: 14px;
        transition: all 0.3s;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.4);
        box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.2);
    }

    /* Iconos de los inputs */
    .input-icon {
        position: absolute;
        left: 15px;
        top: 25px;
        transform: translateY(-50%);
        color: #fff;
        font-size: 18px;
        z-index: 2;
    }

    /* Opciones (remember me y forgot password) */
    .form-options {
        margin: 20px 0;
    }

    .remember-me-label {
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
        user-select: none;
    }

    .form-check-input {
        margin-right: 8px;
        background-color: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .form-check-input:checked {
        background-color: #6c5ce7;
        border-color: #6c5ce7;
    }

    .forgot-password {
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
        text-decoration: none;
        transition: color 0.2s;
    }

    .forgot-password:hover {
        color: #fff;
        text-decoration: underline;
    }

    /* Botón de login */
    .login-button {
        background: #6c5ce7;
        border: none;
        border-radius: 25px;
        padding: 12px;
        font-weight: 600;
        font-size: 16px;
        letter-spacing: 0.5px;
        margin-top: 10px;
        transition: all 0.3s;
    }

    .login-button:hover {
        background: #5649c0;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(108, 92, 231, 0.3);
    }

    /* Enlace de registro */
    .register-link {
        color: rgba(255, 255, 255, 0.8);
        text-align: center;
        margin-top: 25px;
        font-size: 14px;
    }

    .register-link-text {
        color: #fff;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.2s;
    }

    .register-link-text:hover {
        color: #b8b5ff;
        text-decoration: underline;
    }

    /* Mensajes de error */
    .alert-danger {
        background-color: rgba(220, 53, 69, 0.2);
        border-color: rgba(220, 53, 69, 0.3);
        color: #fff;
        border-radius: 10px;
        margin-bottom: 20px;
    }
</style>