<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modulos".
 *
 * @property int $idmodulos
 * @property int|null $idjuegos
 * @property string|null $nombre
 * @property string|null $edicion
 *
 * @property Juegos $idjuegos0
 */
class Modulos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modulos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'idjuegos'], 'required', 'message' => 'Este campo no puede estar vacío.'],
            [['idjuegos'], 'exist', 'targetClass' => Juegos::class, 'targetAttribute' => 'idjuegos', 'message' => 'El juego asociado no existe.'],
            [['nombre'], 'string', 'max' => 50],
            [['edicion'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmodulos' => 'Idmodulos',
            'idjuegos' => 'Idjuegos',
            'nombre' => 'Nombre',
            'edicion' => 'Edicion',
        ];
    }

    /**
     * Gets query for [[Idjuegos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdjuegos0()
    {
        return $this->hasOne(Juegos::class, ['idjuegos' => 'idjuegos']);
    }
}
