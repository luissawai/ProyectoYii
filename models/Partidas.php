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
        [['nombre', 'fechainicio', 'fechafin', 'nombre_equipo', 'idjuegos'], 'required'],
        [['fechainicio', 'fechafin'], 'date', 'format' => 'php:Y-m-d' , 'message' => 'El formato en el cual debes escribir la fecha es YYYY-MM-dd'],
        [['fechainicio'], 'compare', 'compareAttribute' => 'fechafin', 'operator' => '<=', 'message' => 'La fecha de inicio debe ser menor o igual a la fecha de fin.'],
        [['idjuegos'], 'exist', 'targetClass' => Juegos::class, 'targetAttribute' => 'idjuegos', 'message' => 'El juego no existe.'],
        [['nombre', 'nombre_equipo'], 'string', 'max' => 30],
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
    public function getJuego()
    {
    return $this->hasOne(Juegos::class, ['idjuegos' => 'idjuegos']);
    }
    public static function getCount()
    {
    return self::find()->count();
    }
}
