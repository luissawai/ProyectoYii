<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['username', 'email'], 'unique', 'targetClass' => '\\app\\models\\User', 'message' => 'Este nombre de usuario o correo electrónico ya está en uso.'],
            ['email', 'email'],
            ['password', 'string', 'min' => 6],
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
            // Opcional: asignar rol básico
            $auth = Yii::$app->authManager;
            $role = $auth->getRole('usuario');
            $auth->assign($role, $user->id);

            return Yii::$app->user->login($user, 3600 * 24 * 30); // Auto-login después de registro
        }

        Yii::error('Error al registrar usuario: ' . print_r($user->errors, true));
        return false;
    }
}
