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
 * @property Partidas[] $idpartidas
 * @property Juegan[] $juegans
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
        [['nombre', 'rol'], 'required'],
        [['nombre'], 'unique', 'message' => 'Este nombre ya está registrado.'],
        [['rol'], 'in', 'range' => ['jugador', 'master', 'NPC'], 'message' => 'El rol debe ser "jugador", "master" o "NPC".'],
        [['nombre'], 'string', 'max' => 30],
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
     * Gets query for [[Idpartidas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpartidas()
    {
        return $this->hasMany(Partidas::class, ['idpartidas' => 'idpartidas'])->viaTable('juegan', ['idjugadores' => 'idjugadores']);
    }

    /**
     * Gets query for [[Juegans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJuegans()
    {
        return $this->hasMany(Juegan::class, ['idjugadores' => 'idjugadores']);
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
