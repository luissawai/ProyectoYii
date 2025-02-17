<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partidas".
 *
 * @property int $idpartidas
 * @property int|null $idjuegos
 * @property string|null $nombre
 * @property string|null $fechainicio
 * @property string|null $fechafin
 * @property string|null $nombre_equipo
 *
 * @property Juegos $idjuegos0
 * @property Jugadores[] $idjugadores
 * @property Juegan[] $juegans
 */
class Partidas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partidas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idjuegos'], 'integer'],
            [['fechainicio', 'fechafin'], 'safe'],
            [['nombre'], 'string', 'max' => 30],
            [['nombre_equipo'], 'string', 'max' => 20],
            [['idjuegos'], 'exist', 'skipOnError' => true, 'targetClass' => Juegos::class, 'targetAttribute' => ['idjuegos' => 'idjuegos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpartidas' => 'Idpartidas',
            'idjuegos' => 'Idjuegos',
            'nombre' => 'Nombre',
            'fechainicio' => 'Fechainicio',
            'fechafin' => 'Fechafin',
            'nombre_equipo' => 'Nombre Equipo',
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

    /**
     * Gets query for [[Idjugadores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdjugadores()
    {
        return $this->hasMany(Jugadores::class, ['idjugadores' => 'idjugadores'])->viaTable('juegan', ['idpartidas' => 'idpartidas']);
    }

    /**
     * Gets query for [[Juegans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJuegans()
    {
        return $this->hasMany(Juegan::class, ['idpartidas' => 'idpartidas']);
    }
}
