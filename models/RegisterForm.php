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
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password); // Asegura que la contraseña se encripte correctamente
            $user->auth_key = Yii::$app->security->generateRandomString();
            Yii::debug('Registrando nuevo usuario: ' . print_r($user, true), __METHOD__);
            
            if (!$user->save()) {
                Yii::error('Error al guardar usuario: ' . print_r($user->errors, true), __METHOD__);
                return false;
            }
            return true;
        }
        return false;
    }
}
