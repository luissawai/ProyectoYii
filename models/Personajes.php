<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personajes".
 *
 * @property int $idpersonajes
 * @property int|null $idjugadores
 * @property string|null $nombre
 * @property int|null $master
 *
 * @property Clases[] $clases
 * @property Jugadores $idjugadores0
 */
class Personajes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personajes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'idjugadores', 'master'], 'required'],
            [['idjugadores'], 'exist', 'targetClass' => Jugadores::class, 'targetAttribute' => 'idjugadores', 'message' => 'El jugador no existe.'],
            [['master'], 'boolean', 'message' => 'El campo master debe ser 0 (no es master) o 1 (es master).'],
            [['nombre'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpersonajes' => 'Idpersonajes',
            'idjugadores' => 'Idjugadores',
            'nombre' => 'Nombre',
            'master' => 'Master',
        ];
    }

    /**
     * Gets query for [[Clases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClases()
    {
        return $this->hasMany(Clases::class, ['idpersonajes' => 'idpersonajes']);
    }

    /**
     * Gets query for [[Idjugadores0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdjugadores0()
    {
        return $this->hasOne(Jugadores::class, ['idjugadores' => 'idjugadores']);
    }
}
