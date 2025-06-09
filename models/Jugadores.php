<?php

namespace app\models;

use Yii;
use app\models\User;  // Asegúrate de importar el modelo User

/**
 * This is the model class for table "jugadores".
 *
 * @property int $idjugadores
 * @property string|null $nombre
 * @property string|null $rol
 * @property array|null $seleccionables
 *
 * @property Partidas[] $idpartidas
 * @property Juegan[] $juegans
 * @property Personajes[] $personajes
 */
class Jugadores extends \yii\db\ActiveRecord
{
    /**
     * Atributo virtual para opciones seleccionables.
     */
    public $seleccionables = ['jugador', 'master', 'NPC'];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jugadores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'nombre'], 'required'],
            [['user_id'], 'integer'],
            [['nombre'], 'string', 'max' => 30],
            [['rol'], 'string', 'max' => 20],
            // Verifica que la relación exista en la tabla User
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjugadores' => 'ID',
            'user_id'     => 'Usuario',
            'nombre'      => 'Nombre',
            'rol'         => 'Rol',
        ];
    }

    // Relación con el modelo User
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Idpartidas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpartidas()
    {
        return $this->hasMany(Partidas::class, ['idpartidas' => 'idpartidas'])->viaTable('juegan', ['idjugadores' => 'idjugadores']);
    }

    /**
     * Gets query for [[Juegans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJuegans()
    {
        return $this->hasMany(Juegan::class, ['idjugadores' => 'idjugadores']);
    }

    /**
     * Gets query for [[Personajes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonajes()
    {
        return $this->hasMany(Personajes::class, ['idjugadores' => 'idjugadores']);
    }
    public static function getCount()
    {
    return self::find()->count();
    }
}
