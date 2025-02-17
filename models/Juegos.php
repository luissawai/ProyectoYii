<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "juegos".
 *
 * @property int $idjuegos
 * @property string|null $nombre
 * @property string|null $tematica
 * @property string|null $edicion
 *
 * @property Modulos[] $modulos
 * @property Partidas[] $partidas
 */
class Juegos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'juegos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'tematica'], 'required', 'message' => 'Este campo no puede estar vacío.'],
            [['nombre'], 'unique', 'message' => 'El nombre del juego ya está registrado.'],
            [['nombre', 'tematica'], 'string', 'max' => 30, 'tooLong' => 'Máximo 30 caracteres permitidos.'],
            [['edicion'], 'string', 'max' => 10, 'tooLong' => 'Máximo 10 caracteres permitidos.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjuegos' => 'Idjuegos',
            'nombre' => 'Nombre',
            'tematica' => 'Tematica',
            'edicion' => 'Edicion',
        ];
    }

    /**
     * Gets query for [[Modulos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModulos()
    {
        return $this->hasMany(Modulos::class, ['idjuegos' => 'idjuegos']);
    }

    /**
     * Gets query for [[Partidas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPartidas()
    {
        return $this->hasMany(Partidas::class, ['idjuegos' => 'idjuegos']);
    }
}
