<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private ?User $_user = null;

    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'message' => 'Este campo es obligatorio'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($password)
{
    try {
        return Yii::$app->security->validatePassword($password, $this->password);
    } catch (\Exception $e) {
        Yii::error("Error validando contraseña: " . $e->getMessage());
        return false;
    }
}



    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            if ($user) {
                Yii::debug('Login exitoso para usuario: ' . $this->username);
                return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
            }
            Yii::error('Usuario no encontrado después de validación');
        }
        Yii::error('Errores de validación: ' . print_r($this->errors, true));
        return false;
    }

    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
            Yii::debug('User query result: ' . print_r($this->_user, true));
        }

        return $this->_user;
    }
    public function attributeLabels()
    {
        return [
            'username' => 'Usuario o Email',
            'password' => 'Contraseña',
            'rememberMe' => 'Recordarme',
        ];
    }
}
