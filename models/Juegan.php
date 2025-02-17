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
            [['idpartidas', 'idjugadores'], 'integer'],
            [['idpartidas', 'idjugadores'], 'unique', 'targetAttribute' => ['idpartidas', 'idjugadores']],
            [['idjugadores'], 'exist', 'skipOnError' => true, 'targetClass' => Jugadores::class, 'targetAttribute' => ['idjugadores' => 'idjugadores']],
            [['idpartidas'], 'exist', 'skipOnError' => true, 'targetClass' => Partidas::class, 'targetAttribute' => ['idpartidas' => 'idpartidas']],
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
