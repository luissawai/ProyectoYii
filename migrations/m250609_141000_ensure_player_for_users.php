<?php

use yii\db\Migration;

class m250221_113928_ensure_player_for_users extends Migration
{
    public function safeUp()
    {
        // Para cada usuario, crear un jugador si no existe
        $users = \app\models\User::find()->all();
        
        foreach ($users as $user) {
            $jugador = \app\models\Jugadores::find()
                ->where(['user_id' => $user->id])
                ->one();
                
            if (!$jugador) {
                $this->insert('jugadores', [
                    'user_id' => $user->id,
                    'nombre' => $user->username,
                    'rol' => 'Jugador'
                ]);
            }
        }
    }

    public function safeDown()
    {
        echo "Esta migración no puede ser revertida.\n";
        return false;
    }
}