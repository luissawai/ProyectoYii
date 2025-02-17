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
            [['idjugadores', 'master'], 'integer'],
            [['nombre'], 'string', 'max' => 30],
            [['idjugadores'], 'exist', 'skipOnError' => true, 'targetClass' => Jugadores::class, 'targetAttribute' => ['idjugadores' => 'idjugadores']],
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
