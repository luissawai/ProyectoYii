<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jugadores".
 *
 * @property int $idjugadores
 * @property string|null $nombre
 * @property string|null $rol
 *
 * @property Personajes[] $personajes
 */
class Jugadores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jugadores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 30],
            [['rol'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjugadores' => 'Idjugadores',
            'nombre' => 'Nombre',
            'rol' => 'Rol',
        ];
    }

    /**
     * Gets query for [[Personajes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonajes()
    {
        return $this->hasMany(Personajes::class, ['idjugadores' => 'idjugadores']);
    }
}
