<?php 

use app\models\jugadores;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\jugadores $model */

$this->title = 'Detalles del Jugador';
?>

<style>
    body {
        background-color: #2e2e2e;
        color: #ffffff;
    }

    .titulo-principal {
        font-size: 2.5rem;
        font-weight: 800;
        text-align: center;
        margin-bottom: 2rem;
    }

    .jugadores-view {
        background-color: #2c2c2c;
        padding: 3rem;
        border-radius: 1rem;
        max-width: 850px;
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
        border-radius: 1rem;
        margin: 0 0.5rem;
        transition: background 0.3s ease, transform 0.2s ease;
        text-decoration: none;
        font-size: 1.1rem;
    }

    .jugador-actions .btn:hover {
        background-color: #c2185b;
        transform: scale(1.05);
    }

    table {
        margin: 2rem auto;
        width: 80%;
        border-collapse: collapse;
        background-color: #2f2f2f;
        border-radius: 0.5rem;
        overflow: hidden;
        border-spacing: 0;
        border: 1px solid #444;
    }

    thead {
        background-color: #424242;
    }

    th, td {
        padding: 1.2rem;
        text-align: center;
        font-size: 1.2rem;
        border: 1px solid #444;
    }

    th {
        color: #ffffff;
        font-weight: 600;
    }

    td {
        color: #e0e0e0;
    }
</style>

<div class="jugadores-view">
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= Html::encode($model->nombre) ?></td>
                <td><?= Html::encode($model->rol) ?></td>
            </tr>
        </tbody>
    </table>
</div>


