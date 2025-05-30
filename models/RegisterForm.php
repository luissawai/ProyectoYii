<?php


namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_confirm; // Add this property

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_confirm'], 'required', 'message' => 'Este campo es obligatorio'],
            [['username', 'email'], 'unique', 'targetClass' => '\\app\\models\\User', 'message' => 'Este nombre de usuario o correo electrónico ya está en uso.'],
            ['email', 'email', 'message' => 'Ingrese un correo electrónico válido'],
            ['password', 'string', 'min' => 6, 'message' => 'La contraseña debe tener al menos 6 caracteres'],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Las contraseñas no coinciden'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Nombre de usuario',
            'email' => 'Correo electrónico',
            'password' => 'Contraseña',
            'password_confirm' => 'Confirmar contraseña',
        ];
    }

    public function register()
{
    if (!$this->validate()) {
        return false;
    }

    $user = new User();
    $user->username = $this->username;
    $user->email = $this->email;
    $user->setPassword($this->password);
    $user->generateAuthKey();

    if ($user->save()) {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole('usuario');
        $auth->assign($role, $user->id);
        
        Yii::$app->session->setFlash('success', [
            'title' => '¡Bienvenido!',
            'message' => 'Tu cuenta ha sido creada exitosamente.'
        ]);
        
        return Yii::$app->user->login($user, 3600 * 24 * 30);
    }

    Yii::error('Error al registrar usuario: ' . print_r($user->errors, true));
    return false;
}
}
