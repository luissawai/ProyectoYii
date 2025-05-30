<?php
namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                // Para debug
                Yii::error('Login fallido: ' . ($user ? 'Contraseña incorrecta' : 'Usuario no encontrado') . ' para username: ' . $this->username);
                $this->addError($attribute, 'Usuario o contraseña incorrectos');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            // Intenta buscar por email o username
            $this->_user = User::findOne([
                'or', 
                ['username' => $this->username],
                ['email' => $this->username]
            ]);
        }

        return $this->_user;
    }
}