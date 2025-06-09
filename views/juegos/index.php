<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Juegos';

?>

<style>
    body {
        background-color: #2e2e2e;
        color: #ffffff;
        margin-top: 0;
    }

    .juegos-index {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .juegos-index h1 {
        font-size: 3.5rem;
        font-weight: 800;
        color: #ffffff;
        text-align: center;
        margin-top: 0;
        margin-bottom: 0.5rem;
    }

    .crear-btn {
        display: block;
        width: fit-content;
        margin: 2rem auto 3rem;
        background-color: #e91e63;
        color: white;
        font-weight: 600;
        padding: 1rem 2rem;
        border-radius: 1rem;
        transition: background 0.3s ease, transform 0.2s ease;
        font-size: 1.1rem;
        text-decoration: none;
        border: none;
    }

    .crear-btn i {
        margin-left: 0.5rem;
        color: white;
    }

    .crear-btn:hover {
        background-color: #c2185b;
        transform: scale(1.05);
    }

    .crear-btn:visited,
    .crear-btn:focus,
    .crear-btn:active {
        color: white;
        outline: none;
        text-decoration: none;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
    }

    .juego-card {
        background-color: #f5f5f5;
        color: #333;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .juego-card h3 {
        margin-top: 0;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .juego-card p {
        margin: 0.5rem 0;
    }

    .juego-card .acciones {
        margin-top: 1.5rem;
    }

    .juego-card .acciones a {
        margin-right: 0.8rem;
        color: #e91e63;
        font-weight: 600;
        text-decoration: none;
    }

    .juego-card .acciones a:hover {
        text-decoration: underline;
    }
</style>

<div class="juegos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Crear juego <i class="fas fa-plus"></i>', ['create'], ['class' => 'crear-btn']) ?>

    <div class="card-container">
        <?php foreach ($dataProvider->getModels() as $model): ?>
            <div class="juego-card">
                <h3><?= Html::encode($model->nombre) ?></h3>
                <p><strong>Temática:</strong> <?= Html::encode($model->tematica) ?></p>
                <p><strong>Edición:</strong> <?= Html::encode($model->edicion) ?></p>

                <div class="acciones">
                    <?= Html::a('👁 Ver', ['view', 'idjuegos' => $model->idjuegos]) ?>
                    <?= Html::a('🗑 Eliminar', ['delete', 'idjuegos' => $model->idjuegos], [
                        'data' => [
                            'confirm' => '¿Estás seguro de que quieres eliminar este juego?',
                            'method' => 'post',
                        ],
                        'style' => 'color: #e91e63; font-weight: 600;',
                    ]) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

