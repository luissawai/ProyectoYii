<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\db\Exception;

class DatabaseController extends Controller
{
    public function actionImport()
    {
        $db = Yii::$app->db;
        $sqlFile = Yii::getAlias('@console/data/juegosrol_20250217_1821.sql');

        if (!file_exists($sqlFile)) {
            echo "❌ Error: No se encontró el archivo SQL en: $sqlFile\n";
            return;
        }

        try {
            // Leer archivo SQL
            $sql = file_get_contents($sqlFile);
            if (!$sql) {
                echo "❌ Error: El archivo SQL está vacío.\n";
                return;
            }

            // Dividir y ejecutar múltiples consultas
            $commands = explode(';', $sql);
            foreach ($commands as $command) {
                $command = trim($command);
                if (!empty($command)) {
                    $db->createCommand($command)->execute();
                }
            }

            echo "✅ Base de datos importada correctamente.\n";
        } catch (Exception $e) {
            echo "❌ Error al importar la base de datos: " . $e->getMessage() . "\n";
        }
    }
}

