<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['username', 'email'], 'required', 'message' => 'Este campo es obligatorio'],
            [['username', 'email'], 'unique', 'targetClass' => self::class, 'message' => 'Este valor ya está en uso.'],
            ['email', 'email', 'message' => 'Ingresa un email válido'],
            ['password', 'string', 'min' => 6, 'message' => 'La contraseña debe tener al menos 6 caracteres'],
            ['auth_key', 'string'],
            ['status', 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Nombre de usuario',
            'email' => 'Correo electrónico',
            'password' => 'Contraseña',
            'status' => 'Estado',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->generateAuthKey();
            }

            // Hashear la contraseña si es nueva o ha cambiado
            if ($this->isNewRecord || $this->isAttributeChanged('password')) {
                $this->password = Yii::$app->security->generatePasswordHash($this->password);
            }

            return true;
        }
        return false;
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => 10]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token, 'status' => 10]);
    }

    public static function findByUsername($username)
    {
        return static::find()
            ->where([
                'or',
                ['username' => $username],
                ['email' => $username]
            ])
            ->andWhere(['status' => 10])
            ->one();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        Yii::debug('Validating password for user: ' . $this->username);
        try {
            $valid = Yii::$app->security->validatePassword($password, $this->password);
            Yii::debug('Password validation result: ' . ($valid ? 'true' : 'false'));
            return $valid;
        } catch (\Exception $e) {
            Yii::error('Password validation error: ' . $e->getMessage());
            return false;
        }
    }

    public function setPassword($password)
    {
        try {
            $this->password = Yii::$app->security->generatePasswordHash($password);
        } catch (\Exception $e) {
            Yii::error('Error hasheando contraseña: ' . $e->getMessage());
            throw $e;
        }
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generateAccessToken()
    {
        $this->access_token = Yii::$app->security->generateRandomString();
        $this->save(); // Guarda el token en la BD
    }
}
