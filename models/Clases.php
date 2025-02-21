<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clases".
 *
 * @property int $idpersonajes
 * @property string $clases
 *
 * @property Personajes $personaje
 */
class Clases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpersonajes', 'clases'], 'required'],
            [['idpersonajes'], 'integer'],
            [['clases'], 'string', 'max' => 20],
            [['idpersonajes'], 'exist', 'skipOnError' => true, 'targetClass' => Personajes::class, 'targetAttribute' => ['idpersonajes' => 'idpersonajes']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpersonajes' => 'ID Personaje',
            'clases' => 'Clases',
            'idnombre' => 'ID Nombre',
        ];
    }

    /**
     * Gets query for [[Personaje]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaje()
    {
        return $this->hasOne(Personajes::class, ['idpersonajes' => 'idpersonajes']);
    }
}
