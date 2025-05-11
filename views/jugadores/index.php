<?php

use app\models\jugadores;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jugadores';
/*$this->params['breadcrumbs'][] = $this->title;*/
?>
<style>
    body {
        background-color: #2e2e2e; /* negro más claro */
        color: #ffffff;
    }
    .jugadores-index {
        padding: 2rem;
    }

    /* NUEVO título centrado */
    .titulo-principal {
        font-size: 2.8rem;
        font-weight: 800;
        color: #ffffff;
        text-align: center;
        margin-bottom: 2rem;
    }

    .jugadores-header {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-bottom: 1.5rem;
        padding: 0 1rem;
    }

    .jugador-card {
        background-color: #f4edf7;
        color: #000000;
        border-radius: 1rem;
        padding: 1rem;
        margin-bottom: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        opacity: 0;
        animation: fadeIn 0.5s ease-in-out forwards;
        transition: transform 0.2s ease-in-out;
        position: relative;
        padding-left: 5rem;
    }
    
    .jugador-avatar {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        background-color: #e91e63;
        color: white;
        font-weight: bold;
        font-size: 1.2rem;
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .jugador-card:hover {
        transform: scale(1.02);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .jugador-info {
        margin-left: 0.5rem; /* separa un poco más del avatar */
        display: flex;
        flex-direction: column;
    }

    .jugador-nombre {
        font-weight: bold;
        font-size: 1.2rem;
    }

    .jugador-rol {
        font-size: 0.9rem;
        color: #555;
    }

    .jugador-actions a {
        margin-left: 0.5rem;
        background-color: #ccc;
        padding: 0.3rem 0.6rem;
        border-radius: 0.5rem;
        text-decoration: none;
        color: black;
    }

    .jugador-actions a:hover {
        background-color: #aaa;
    }

    .create-btn {
        background-color: #e91e63;
        border: none;
        padding: 0.6rem 1rem;
        color: white;
        border-radius: 0.5rem;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
        display: inline-block;
    }

    .create-btn:hover {
        background-color: #d81b60;
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(233, 30, 99, 0.4);
    }

    .create-btn:focus,
    .create-btn:active,
    .create-btn:visited {
        color: white;
        text-decoration: none;
        outline: none;
    }
</style>

<div class="jugadores-index">

    <!-- TÍTULO CENTRADO ARRIBA -->
    <h1 class="titulo-principal"><?= Html::encode($this->title) ?></h1>

    <!-- BOTÓN A LA DERECHA -->
    <div class="jugadores-header">
        <?= Html::a('Crea tu jugador', ['create'], ['class' => 'create-btn']) ?>
    </div>

    <?php foreach ($dataProvider->getModels() as $jugador): ?>
        <div class="jugador-card">
            <div class="jugador-avatar">
                <?= strtoupper(substr(Html::encode($jugador->nombre), 0, 1)) ?>
            </div>
            <div class="jugador-info">
                <div class="jugador-nombre"><?= Html::encode($jugador->nombre) ?></div>
                <div class="jugador-rol"><?= Html::encode($jugador->rol) ?></div>
            </div>
            <div class="jugador-actions">
                <?= Html::a('👁️', ['view', 'idjugadores' => $jugador->idjugadores]) ?>
                <!-- Botón de actualizar eliminado -->
                <?= Html::a('🗑️', ['delete', 'idjugadores' => $jugador->idjugadores], [
                    'data' => [
                        'confirm' => '¿Estás seguro de que deseas eliminar este jugador?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    <?php endforeach; ?>

</div>
















