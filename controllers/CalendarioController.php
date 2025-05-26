<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class CalendarioController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEventos()
    {
        $filePath = Yii::getAlias('@webroot') . '/data/eventos.json';

        if (!file_exists($filePath)) {
            return $this->asJson([]);
        }

        $contenido = file_get_contents($filePath);
        $eventos = json_decode($contenido, true);

        if ($eventos === null && json_last_error() !== JSON_ERROR_NONE) {
            return $this->asJson([]);
        }

        return $this->asJson($eventos);
    }

    public function actionGuardarEvento()
    {
        $filePath = Yii::getAlias('@webroot') . '/data/eventos.json';
        $eventos = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

        $id = Yii::$app->request->post('id');
        if (empty($id)) {
            $id = uniqid(); // Genera un ID único si no viene del cliente
        }

        $evento = [
            'id' => $id,
            'title' => Yii::$app->request->post('title'),
            'start' => Yii::$app->request->post('start'),
            'end' => Yii::$app->request->post('end')
        ];

        $eventos[] = $evento;

        if (file_put_contents($filePath, json_encode($eventos))) {
            return $this->asJson(['success' => true, 'evento' => $evento]);
        }

        return $this->asJson(['success' => false]);
    }


    public function actionEliminarEvento()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // Verificar si 'id' está presente en la solicitud POST
        $id = Yii::$app->request->post('id');
        if (empty($id)) {
            return ['success' => false, 'error' => 'ID del evento no proporcionado'];
        }

        $filePath = Yii::getAlias('@webroot') . '/data/eventos.json';

        // Verificar si el archivo JSON existe
        if (!file_exists($filePath)) {
            return ['success' => false, 'error' => 'Archivo no encontrado'];
        }

        // Leemos el archivo JSON
        $contenido = file_get_contents($filePath);
        $eventos = json_decode($contenido, true);

        if ($eventos === null) {
            return ['success' => false, 'error' => 'Error al decodificar el archivo JSON'];
        }

        // Filtramos el evento con el ID proporcionado
        $nuevosEventos = array_filter($eventos, function ($evento) use ($id) {
            return isset($evento['id']) && $evento['id'] != $id;

        });

        // Si no se encontró el evento a eliminar
        if (count($nuevosEventos) === count($eventos)) {
            return ['success' => false, 'error' => 'Evento no encontrado'];
        }

        // Guardamos los eventos filtrados de nuevo
        if (file_put_contents($filePath, json_encode(array_values($nuevosEventos), JSON_PRETTY_PRINT))) {
            return ['success' => true];
        }

        return ['success' => false, 'error' => 'Error al guardar los cambios en el archivo'];
    }



}


