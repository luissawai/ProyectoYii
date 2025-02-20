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
 * @property Jugadores $jugador // Relación con la tabla Jugadores
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
            'idjugadores' => 'Id del jugador',
            'nombre' => 'Nombre del personaje',
            'master' => 'Manejado por el master',
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
     * Gets query for [[Jugador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJugador()
    {
        return $this->hasOne(Jugadores::class, ['idjugadores' => 'idjugadores']);
    }
    public function getMasterText()
{
    return $this->master ? 'Sí' : 'No';
}

}