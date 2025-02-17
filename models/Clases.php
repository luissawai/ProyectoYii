<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clases".
 *
 * @property int $idpersonajes
 * @property string $clases
 *
 * @property Personajes $idpersonajes0
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
            [['idpersonajes'], 'exist', 'targetClass' => Personajes::class, 'targetAttribute' => 'idpersonajes'],
            [['clases'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpersonajes' => 'Idpersonajes',
            'clases' => 'Clases',
        ];
    }

    /**
     * Gets query for [[Idpersonajes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpersonajes0()
    {
        return $this->hasOne(Personajes::class, ['idpersonajes' => 'idpersonajes']);
    }
}
