<?php

namespace app\models;

use Yii;
use app\models\Jugadores;
use app\models\Clases;

/**
 * This is the model class for table "personajes".
 *
 * @property int $idpersonajes
 * @property int $idjugadores
 * @property string $nombre
 * @property int $master
 *
 * @property Clases[] $clases
 * @property Jugadores $jugador
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
            [['nombre', 'idjugadores', 'master'], 'required', 'message' => 'Este campo es obligatorio'],
            [['idjugadores'], 'integer'],
            [['master'], 'boolean', 'message' => 'El campo master debe ser 0 (no es master) o 1 (es master).'],
            [['nombre'], 'string', 'max' => 30],
            [['idjugadores'], 'exist', 
                'targetClass' => Jugadores::class, 
                'targetAttribute' => ['idjugadores' => 'idjugadores'], 
                'message' => 'El jugador no existe.'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpersonajes' => 'ID',
            'idjugadores' => 'Jugador',
            'nombre' => 'Nombre del personaje',
            'master' => '¿Es master?',
        ];
    }

    /**
     * Relación con Clases (Un personaje puede tener varias clases)
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClases()
    {
        return $this->hasMany(Clases::class, ['idpersonajes' => 'idpersonajes']);
    }

    /**
     * Relación con Jugadores (Un personaje pertenece a un jugador)
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJugador()
    {
        return $this->hasOne(Jugadores::class, ['idjugadores' => 'idjugadores']);
    }

    /**
     * Devuelve el texto para indicar si el personaje es master.
     *
     * @return string
     */
    public function getMasterText()
    {
        return $this->master ? 'Sí' : 'No';
    }

    /**
     * Devuelve una lista de clases en formato de texto.
     *
     * @return string
     */
    public function getClasesTexto()
    {
        $clasesArray = array_map(function ($clase) {
            return $clase->clases; // Asegúrate de que 'clases' es el atributo correcto en la tabla 'Clases'
        }, $this->clases);
        
        return empty($clasesArray) ? '(Sin clases)' : implode(', ', $clasesArray);
    }

    /**
     * Retorna el total de registros en la tabla personajes.
     *
     * @return int
     */
    public static function getCount()
    {
        return self::find()->count();
    }
}
