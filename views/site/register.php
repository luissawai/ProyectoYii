<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 bg-white rounded login-card">
        <div class="card-body">
            <h3 class="text-center mb-3"><?= Html::encode($this->title) ?></h3>
            <p class="text-center text-muted">Please fill out the fields to create an account:</p>

            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'fieldConfig' => [
                    'template' => "<div class='form-group'>{label}{input}{error}</div>",
                    'labelOptions' => ['class' => 'form-label'],
                    'inputOptions' => ['class' => 'form-control'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Enter your username']) ?>
            <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Enter your email']) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Enter your password']) ?>

            <div class="d-grid">
                <?= Html::submitButton('Register', ['class' => 'btn btn-success btn-block', 'name' => 'register-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="text-center mt-3">
                <p>Already have an account? <?= Html::a('Login here', ['site/login']) ?></p>
            </div>
        </div>
    </div>
</div>
