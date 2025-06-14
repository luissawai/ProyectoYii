<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Bienvenido de nuevo';
?>

<div class="login-wrapper">
    <div class="login-split">
        <!-- Left Side - Hero Section -->
        <div class="login-hero">
            <div class="hero-content">
                <h2>"La aventura te espera en cada sesión"</h2>
                <p>Gestiona tus campañas y personajes de rol</p>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-form-container">
            <div class="form-header">
                <?= Html::img('@web/images/logo1.jpg', ['class' => 'login-logo', 'alt' => 'Logo']) ?>
                <h1><?= Html::encode($this->title) ?></h1>
                <p class="subtitle">Gestiona tu mundo de aventuras</p>
            </div>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <div class="form-group">
                <?= $form->field($model, 'username', [
                    'options' => ['class' => 'custom-input-group'],
                ])->textInput([
                    'placeholder' => 'Email',
                    'class' => 'custom-input'
                ])->label(false) ?>
            </div>

            <div class="form-group password-field">
                <?= $form->field($model, 'password', [
                    'options' => ['class' => 'custom-input-group'],
                ])->passwordInput([
                    'placeholder' => 'Contraseña',
                    'class' => 'custom-input password-input',
                    'id' => 'password-input'
                ])->label(false) ?>
                <span class="password-toggle">
                    <i class="fas fa-eye" id="password-toggle-icon"></i>
                </span>
            </div>

            <div class="form-options">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => '<div class="custom-checkbox-wrapper">{input} {label}</div>',
                    'label' => 'Recordar datos',
                    'class' => 'custom-checkbox',
                    'id' => 'remember-checkbox'
                ]) ?>
                <?= Html::a('¿Olvidaste tu contraseña?', ['site/request-password-reset'], ['class' => 'forgot-link']) ?>
            </div>
            <?= Html::submitButton('Iniciar sesión', ['class' => 'login-button']) ?>

            <?php ActiveForm::end(); ?>

            <div class="signup-prompt">
                <span>¿No tienes una cuenta?</span>
                <?= Html::a('Regístrate', ['site/register'], ['class' => 'signup-link']) ?>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary: #3c096c;
        --secondary: #080f19;
        --accent: #C1A15A;
        --text-primary: #ffffff;
        --text-secondary: #9f9f9f;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        background: var(--secondary);
    }

    .login-split {
        display: flex;
        width: 100%;
        max-width: 1400px;
        margin: auto;
        background: rgba(60, 9, 108, 0.1);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .login-hero {
        flex: 1;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        padding: 3rem;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .hero-content {
        color: var(--text-primary);
        position: relative;
        z-index: 1;
    }

    .hero-content h2 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        font-family: 'MedievalSharp', cursive;
    }

    .login-form-container {
        flex: 1;
        padding: 3rem;
        background: rgba(8, 15, 25, 0.95);
        display: flex;
        flex-direction: column;
    }

    .form-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .login-logo {
        width: 80px;
        height: 80px;
        margin-bottom: 1.5rem;
    }

    .form-header h1 {
        color: var(--text-primary);
        font-size: 1.75rem;
        margin-bottom: 0.5rem;
    }

    .subtitle {
        color: var(--text-secondary);
    }

    .custom-input-group {
        margin-bottom: 1.5rem;
    }

    .custom-input {
        width: 100%;
        padding: 1rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.05);
        color: var(--text-primary);
        transition: all 0.3s ease;
    }

    .custom-input:focus {
        border-color: var(--primary);
        background: rgba(255, 255, 255, 0.1);
        outline: none;
    }

    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .custom-checkbox-wrapper {
        color: var(--text-secondary);
    }

    .forgot-link {
        color: var(--accent);
        text-decoration: none;
    }


    .login-button {
        width: 100%;
        padding: 1rem;
        background: var(--primary);
        color: var(--text-primary);
        border: none;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .login-button:hover {
        background: #4c0b86;
        transform: translateY(-1px);
    }

    .social-login {
        margin: 2rem 0;
        text-align: center;
    }

    .divider {
        position: relative;
        margin: 1.5rem 0;
        text-align: center;
    }

    .divider span {
        color: var(--text-secondary);
        background: var(--secondary);
        padding: 0 1rem;
        font-size: 0.9rem;
        position: relative;
        z-index: 1;
    }

    .divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: rgba(255, 255, 255, 0.1);
    }

    .google-button {
        width: 100%;
        padding: 1rem;
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .google-button:hover {
        background: rgba(255, 255, 255, 0.05);
    }

    .signup-prompt {
        text-align: center;
        margin-top: auto;
        padding-top: 2rem;
        color: var(--text-secondary);
    }

    .signup-link {
        color: var(--accent);
        text-decoration: none;
        margin-left: 0.5rem;
    }

    @media (max-width: 768px) {
        .login-hero {
            display: none;
        }

        .login-split {
            margin: 0;
            border-radius: 0;
        }

        .login-form-container {
            padding: 2rem;
        }
    }

    .password-field {
        position: relative;
    }


    .password-toggle {
        position: absolute;
        right: 12px;
        top: 45%;
        /* Changed from 50% to 45% to move it up slightly */
        transform: translateY(-50%);
        cursor: pointer;
        color: var(--text-secondary);
        transition: color 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        /* Changed from 100% to fixed height */
        z-index: 2;
        pointer-events: all;
    }

    .password-toggle i {
        font-size: 16px;
        line-height: 1;
        transform: translateY(-2px);
        /* Added to fine-tune the icon position */
    }

    .password-toggle:hover {
        color: var(--accent);
    }

    .custom-checkbox-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .custom-checkbox {
        appearance: none;
        -webkit-appearance: none;
        width: 18px;
        height: 18px;
        border: 2px solid var(--text-secondary);
        border-radius: 4px;
        cursor: pointer;
        position: relative;
        transition: all 0.3s ease;
    }

    .custom-checkbox:checked {
        background-color: var(--accent);
        border-color: var(--accent);
    }

    .custom-checkbox:checked::after {
        content: '✓';
        position: absolute;
        color: var(--text-primary);
        font-size: 12px;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .custom-checkbox:checked {
        background-color: var(--accent);
        border-color: var(--accent);
    }

    .custom-checkbox:checked::after {
        content: '✓';
        position: absolute;
        color: var(--text-primary);
        font-size: 12px;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .custom-checkbox:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(193, 161, 90, 0.2);
    }
</style>
<?php
$this->registerJs("
    if (typeof BrowserSync !== 'undefined') {
        BrowserSync.socket.emit('browser:reload');
    }
");
?>

<?php
$js = <<<JS
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
    const usernameInput = document.querySelector('[name="LoginForm[username]"]');
    const rememberCheckbox = document.querySelector('[name="LoginForm[rememberMe]"]');

    // Cargar datos guardados si existen
    if (localStorage.getItem('rememberedUser')) {
        usernameInput.value = localStorage.getItem('rememberedUser');
        rememberCheckbox.checked = true;
    }

    // Manejar el envío del formulario
    loginForm.addEventListener('submit', function() {
        if (rememberCheckbox.checked) {
            localStorage.setItem('rememberedUser', usernameInput.value);
        } else {
            localStorage.removeItem('rememberedUser');
        }
    });

    // Limpiar datos guardados si se desmarca la casilla
    rememberCheckbox.addEventListener('change', function() {
        if (!this.checked) {
            localStorage.removeItem('rememberedUser');
        }
    });
});
JS;

$this->registerJs($js);
?>