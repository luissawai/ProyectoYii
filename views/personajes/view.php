<?php 

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Personajes $model */

$this->title = $model->nombre;

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

    .personajes-view {
        background-color: #2c2c2c;
        padding: 3rem;
        border-radius: 1rem;
        max-width: 1100px; /* Más ancho para la caja */
        margin: 3rem auto;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
        text-align: center;
    }

    .personaje-actions {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .personaje-actions .btn {
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

    .personaje-actions .btn:hover {
        background-color: #c2185b;
        transform: scale(1.05);
    }

    table {
        margin: 2rem auto;
        width: 100%; /* Ocupa todo el ancho disponible */
        max-width: 1000px; /* Limita máximo ancho de tabla */
        border-collapse: collapse;
        background-color: #2f2f2f;
        border-radius: 0.5rem;
        overflow: hidden;
        border-spacing: 0;
        border: 1px solid #444;
        table-layout: fixed; /* Fija la distribución de columnas */
    }

    thead {
        background-color: #424242;
    }

    th, td {
        padding: 1.5rem 1rem;
        text-align: center;
        font-size: 1.3rem;
        border: 1px solid #444;
        word-wrap: break-word; /* Para que el texto se ajuste dentro */
    }

    th {
        color: #ffffff;
        font-weight: 600;
    }

    td {
        color: #e0e0e0;
    }

    /* Ajuste ancho columnas proporcional */
    th:nth-child(1), td:nth-child(1) { width: 25%; }
    th:nth-child(2), td:nth-child(2) { width: 35%; }
    th:nth-child(3), td:nth-child(3) { width: 15%; }
    th:nth-child(4), td:nth-child(4) { width: 25%; }
</style>

<div class="personajes-view">
    <h1 class="titulo-principal"><?= Html::encode($this->title) ?></h1>

    <div class="personaje-actions">
        <?= Html::a('🏠 Volver a Personajes', ['index'], ['class' => 'btn']) ?>
        <?= Html::a('✏️ Actualizar', ['update', 'idpersonajes' => $model->idpersonajes], ['class' => 'btn']) ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Clase(s)</th>
                <th>¿Es master?</th>
                <th>Jugador</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= Html::encode($model->nombre) ?></td>
                <td><?= Html::encode($model->clasesTexto) ?></td>
                <td><?= Html::encode($model->masterText) ?></td>
                <td><?= Html::encode($model->jugador ? $model->jugador->nombre : '(Sin jugador)') ?></td>
            </tr>
        </tbody>
    </table>
</div>




