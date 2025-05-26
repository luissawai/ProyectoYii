<?php

use yii\db\Migration;

class m250526_000001_initial_setup extends Migration
{
    public function safeUp()
    {
        // Desactivar foreign key checks
        $this->execute('SET FOREIGN_KEY_CHECKS=0');

        // Crear tabla juegos
        $this->createTable('juegos', [
            'idjuegos' => $this->primaryKey(),
            'nombre' => $this->string(30),
            'tematica' => $this->string(30),
            'edicion' => $this->string(10),
        ]);

        // Crear tabla partidas
        $this->createTable('partidas', [
            'idpartidas' => $this->primaryKey(),
            'idjuegos' => $this->integer(),
            'nombre' => $this->string(30),
            'fechainicio' => $this->date(),
            'fechafin' => $this->date(),
            'nombre_equipo' => $this->string(20),
        ]);

        // Crear tabla modulos
        $this->createTable('modulos', [
            'idmodulos' => $this->primaryKey(),
            'idjuegos' => $this->integer(),
            'nombre' => $this->string(50),
            'edicion' => $this->string(10),
        ]);

        // Crear tabla jugadores
        $this->createTable('jugadores', [
            'idjugadores' => $this->primaryKey(),
            'nombre' => $this->string(30),
            'rol' => $this->string(20),
        ]);

        // Crear tabla personajes
        $this->createTable('personajes', [
            'idpersonajes' => $this->primaryKey(),
            'idjugadores' => $this->integer(),
            'nombre' => $this->string(30),
            'master' => $this->boolean(),
        ]);

        // Crear tabla clases
        $this->createTable('clases', [
            'idpersonajes' => $this->integer(),
            'clases' => $this->string(20),
            'PRIMARY KEY(idpersonajes, clases)',
        ]);

        // Crear tabla juegan
        $this->createTable('juegan', [
            'idjuegan' => $this->primaryKey(),
            'idpartidas' => $this->integer(),
            'idjugadores' => $this->integer(),
        ]);

        // Añadir foreign keys
        $this->addForeignKey('fk_juegos_partidas', 'partidas', 'idjuegos', 'juegos', 'idjuegos', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_juegos_modulos', 'modulos', 'idjuegos', 'juegos', 'idjuegos', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_jugadores_personajes', 'personajes', 'idjugadores', 'jugadores', 'idjugadores', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_clases_personajes', 'clases', 'idpersonajes', 'personajes', 'idpersonajes', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_juegan_jugadores', 'juegan', 'idjugadores', 'jugadores', 'idjugadores');
        $this->addForeignKey('fk_juegan_partidas', 'juegan', 'idpartidas', 'partidas', 'idpartidas');

        // Insertar datos iniciales
        $this->batchInsert('juegos', ['idjuegos', 'nombre', 'tematica', 'edicion'], [
            [1, 'Dungeons & Dragons', 'Fantasía medieval', '5e'],
            [2, 'Cyberpunk 2020', 'Ciencia ficción', '2020'],
            [3, 'Vampiro: La Mascarada', 'Horror gótico', '20 Anivers'],
            [4, 'La Llamada de Cthulhu', 'Terror cósmico', '7a'],
            [5, 'Pathfinder', 'Fantasía medieval', '2e'],
        ]);

        // Insertar datos en la tabla partidas
        $this->batchInsert('partidas', ['idpartidas', 'idjuegos', 'nombre', 'fechainicio', 'fechafin', 'nombre_equipo'], [
            [1, 1, 'Exploradores de Barovia', '2024-01-01', '2024-03-01', 'Los Valientes'],
            [2, 2, 'Hackers en Night City', '2024-02-15', '2024-04-15', 'CyberRunners'],
            [3, 3, 'Caza de Sangre', '2024-03-10', '2024-05-10', 'Los Condenados'],
            [4, 4, 'Locura en Arkham', '2024-04-20', '2024-06-20', 'Los Inquisitivos'],
            [5, 5, 'La última cruzada', '2024-05-05', '2024-07-05', 'Caballeros Perdidos'],
        ]);

        // Insertar datos en la tabla jugadores
        $this->batchInsert('jugadores', ['idjugadores', 'nombre', 'rol'], [
            [1, 'Carlos', 'Jugador'],
            [2, 'Andrea', 'Master'],
            [3, 'Luis', 'Jugador'],
            [4, 'Marta', 'Jugador'],
            [5, 'Javier', 'Master'],
        ]);

        // Insertar datos en la tabla personajes
        $this->batchInsert('personajes', ['idpersonajes', 'idjugadores', 'nombre', 'master'], [
            [2, 2, 'Morgana la Hechicera', 1],
            [3, 3, 'Raiden el Asesino', 0],
            [4, 4, 'Samantha la Psíquica', 0],
            [5, 5, 'Dante el Caballero Oscuro', 1],
        ]);

        // Insertar datos en la tabla modulos
        $this->batchInsert('modulos', ['idmodulos', 'idjuegos', 'nombre', 'edicion'], [
            [1, 1, 'Curse of Strahd', '5e'],
            [2, 2, 'Night City', '2020'],
            [3, 3, 'Chicago by Night', '20 Anivers'],
            [4, 4, 'Las sombras de Yog-Sothoth', '7a'],
            [5, 5, 'Kingmaker', '2e'],
        ]);

        // Insertar datos en la tabla juegan
        $this->batchInsert('juegan', ['idjuegan', 'idpartidas', 'idjugadores'], [
            [1, 1, 1],
            [2, 1, 2],
            [3, 2, 3],
            [4, 2, 4],
            [6, 3, 1],
            [5, 3, 5],
            [7, 4, 2],
            [8, 4, 3],
            [9, 5, 4],
            [10, 5, 5],
        ]);

        // Insertar datos en la tabla clases
        $this->batchInsert('clases', ['idpersonajes', 'clases'], [
            [2, 'Mago'],
            [3, 'Asesino'],
            [4, 'Psíquico'],
            [5, 'Caballero Oscuro'],
        ]);

        // Activar foreign key checks
        $this->execute('SET FOREIGN_KEY_CHECKS=1');
    }

    public function safeDown()
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0');

        $this->dropTable('juegan');
        $this->dropTable('clases');
        $this->dropTable('personajes');
        $this->dropTable('jugadores');
        $this->dropTable('modulos');
        $this->dropTable('partidas');
        $this->dropTable('juegos');

        $this->execute('SET FOREIGN_KEY_CHECKS=1');
    }
}
