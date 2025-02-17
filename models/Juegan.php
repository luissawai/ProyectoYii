<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "juegan".
 *
 * @property int $idjuegan
 * @property int|null $idpartidas
 * @property int|null $idjugadores
 *
 * @property Jugadores $idjugadores0
 * @property Partidas $idpartidas0
 */
class Juegan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'juegan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
            return [
                [['idpartidas', 'idjugadores'], 'required'],
                [['idpartidas'], 'exist', 'targetClass' => Partidas::class, 'targetAttribute' => 'idpartidas', 'message' => 'Este nombre ya está registrado.'],
                [['idjugadores'], 'exist', 'targetClass' => Jugadores::class, 'targetAttribute' => 'idjugadores', 'message' => 'Este nombre ya está registrado.'],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjuegan' => 'Idjuegan',
            'idpartidas' => 'Idpartidas',
            'idjugadores' => 'Idjugadores',
        ];
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

    /**
     * Gets query for [[Idpartidas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpartidas0()
    {
        return $this->hasOne(Partidas::class, ['idpartidas' => 'idpartidas']);
    }
}
