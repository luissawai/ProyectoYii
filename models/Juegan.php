<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "juegan".
 *
 * @property int|null $idpartidas
 * @property int|null $idjugadores
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpartidas' => 'Idpartidas',
            'idjugadores' => 'Idjugadores',
        ];
    }
}
