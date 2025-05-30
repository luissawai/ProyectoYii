<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Únete a la aventura';
?>

<div class="register-wrapper">
    <div class="register-split">
        <!-- Left Side - Hero Section -->
        <div class="register-hero">
            <div class="hero-content">
                <h2>"Comienza tu viaje legendario"</h2>
                <p>Crea personajes únicos, forja historias épicas y únete a una comunidad de aventureros.</p>
            </div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="register-form-container">
            <div class="form-header">
                <?= Html::img('@web/images/logo1.jpg', ['class' => 'register-logo', 'alt' => 'Logo']) ?>
                <h1><?= Html::encode($this->title) ?></h1>
                <p class="subtitle">Crea tu cuenta de aventurero</p>
            </div>

            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'options' => ['class' => 'register-form needs-validation'],
                'validateOnType' => true,
                'validateOnChange' => true,
            ]); ?>

            <div class="form-group">
                <?= $form->field($model, 'username', [
                    'options' => ['class' => 'custom-input-group'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ])->textInput([
                    'placeholder' => 'Nombre de usuario',
                    'class' => 'custom-input form-control',
                    'required' => true
                ])->label(false) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'email', [
                    'options' => ['class' => 'custom-input-group'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ])->textInput([
                    'placeholder' => 'Correo electrónico',
                    'class' => 'custom-input form-control',
                    'type' => 'email',
                    'required' => true
                ])->label(false) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'password', [
                    'options' => ['class' => 'custom-input-group'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ])->passwordInput([
                    'placeholder' => 'Contraseña',
                    'class' => 'custom-input form-control',
                    'required' => true
                ])->label(false) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'password_confirm', [
                    'options' => ['class' => 'custom-input-group'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ])->passwordInput([
                    'placeholder' => 'Confirmar contraseña',
                    'class' => 'custom-input form-control',
                    'required' => true
                ])->label(false) ?>
            </div>

            <?= Html::submitButton('Crear cuenta', ['class' => 'register-button']) ?>

            <?php ActiveForm::end(); ?>

            <div class="login-prompt">
                <span>¿Ya tienes una cuenta?</span>
                <?= Html::a('Inicia sesión', ['site/login'], ['class' => 'login-link']) ?>
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

    .register-wrapper {
        min-height: 100vh;
        display: flex;
        background: var(--secondary);
    }

    .register-split {
        display: flex;
        width: 100%;
        max-width: 1400px;
        margin: auto;
        background: rgba(60, 9, 108, 0.1);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .register-hero {
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

    .hero-content p {
        font-size: 1.1rem;
        opacity: 0.9;
        line-height: 1.6;
    }

    .register-form-container {
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

    .register-logo {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-bottom: 1.5rem;
        border: 2px solid var(--accent);
        padding: 2px;
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

    .register-button {
        width: 100%;
        padding: 1rem;
        background: var(--primary);
        color: var(--text-primary);
        border: none;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .register-button:hover {
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

    .login-prompt {
        text-align: center;
        margin-top: auto;
        padding-top: 2rem;
        color: var(--text-secondary);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .login-link {
        color: var(--accent);
        text-decoration: none;
        margin-left: 0.5rem;
        transition: color 0.3s ease;
    }

    .login-link:hover {
        color: #d4b76b;
        text-decoration: none;
    }

    .invalid-feedback {
        color: #ff4d4d;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    .custom-input.form-control.is-invalid {
        border-color: #dc3545;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        padding-right: calc(1.5em + 0.75rem);
    }

    .custom-input.form-control.is-valid {
        border-color: #198754;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23198754' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        padding-right: calc(1.5em + 0.75rem);
    }

    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875rem;
        color: #dc3545;
    }

    @media (max-width: 768px) {
        .register-hero {
            display: none;
        }

        .register-split {
            margin: 0;
            border-radius: 0;
        }

        .register-form-container {
            padding: 2rem;
        }
    }
</style>