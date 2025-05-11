<?php

use app\models\jugadores;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\jugadores $model */

$this->title = 'Detalles del Jugador';
/*$this->params['breadcrumbs'][] = $this->title; */
?>
<style>
    body {
        background-color: #2e2e2e; /* negro más claro */
        color: #ffffff;
    }

    /* Título más grande */
    .titulo-principal {
        font-size: 2.5rem; /* Ajustamos el tamaño a 2.5rem */
        font-weight: 800;
        color: #ffffff;
        text-align: center;
        margin-bottom: 2rem;
    }

    .jugadores-view {
        background-color: #2c2c2c;
        padding: 4rem; /* Ajustamos el padding para mayor espacio */
        border-radius: 1rem;
        max-width: 1100px;
        margin: 3rem auto;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
        text-align: center;
    }

    .jugador-actions {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .jugador-actions .btn {
        background-color: #e91e63;
        color: white;
        font-weight: 600;
        padding: 1rem 2rem;
        border-radius: 1rem; /* Bordes más redondeados */
        margin-left: 1rem;
        transition: background 0.3s ease, transform 0.2s ease;
        text-decoration: none;
        font-size: 1.1rem;
    }

    .jugador-actions .btn:hover {
        background-color: #c2185b;
        transform: scale(1.05);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #2f2f2f;
        border-radius: 0.5rem;
        overflow: hidden;
        margin-top: 3rem;
        border-spacing: 0; /* Asegura que no haya espacio entre las celdas */
    }

    thead {
        background-color: #424242;
    }

    th, td {
        padding: 1.5rem; /* Ajustamos el padding para hacer las celdas más simétricas */
        text-align: center; /* Centramos el texto de las celdas */
        line-height: 1.4; /* Ajustamos el line-height para un espaciado más compacto */
        width: 33.33%; /* Aseguramos que cada celda tenga el mismo ancho */
    }

    th {
        color: #ffffff;
        font-weight: 600;
        font-size: 1.5rem; /* Aumentamos el tamaño de los encabezados */
    }

    td {
        color: #e0e0e0;
        vertical-align: middle;
        font-size: 1.2rem; /* Ajustamos el tamaño de las celdas */
    }

    /* Aseguramos que las celdas tengan el mismo tamaño y margen uniforme */
    td {
        margin: 0 auto; /* Centrar contenido de las celdas */
    }

    table, th, td {
        border: 1px solid #444; /* Añadimos un borde para las celdas */
    }
</style>

<div class="jugadores-view">
    <!-- Título más grande -->
    <h1 class="titulo-principal"><?= Html::encode($this->title) ?></h1>

    <div class="jugador-actions">
        <?= Html::a('🏠 Volver a la página principal', ['index'], ['class' => 'btn']) ?>
        <?= Html::a('✏️ Actualizar', ['update', 'idjugadores' => $model->idjugadores], ['class' => 'btn']) ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Rol</th>
                <th>ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= Html::encode($model->nombre) ?></td>
                <td><?= Html::encode($model->rol) ?></td>
                <td><?= Html::encode($model->idjugadores) ?></td>
            </tr>
        </tbody>
    </table>
</div>