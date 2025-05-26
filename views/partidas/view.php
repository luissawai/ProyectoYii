<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\partidas $model */

$this->title = 'Partida #' . $model->idpartidas;

\yii\web\YiiAsset::register($this);
?>

<style>
    body {
        background-color: #2e2e2e;
        color: #ffffff;
    }

    .partidas-view {
        background-color: #2c2c2c;
        padding: 3rem;
        border-radius: 1rem;
        max-width: 800px;
        margin: 4rem auto;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
    }

    .partidas-view h1 {
        font-size: 2.5rem;
        font-weight: 800;
        text-align: center;
        color: #ffffff;
        margin-bottom: 2rem;
    }

    .partidas-view .btn {
        background-color: #e91e63;
        color: white;
        font-weight: 600;
        padding: 0.7rem 1.5rem;
        border-radius: 1rem;
        margin: 0.5rem 0.5rem 1.5rem 0;
        transition: background 0.3s ease, transform 0.2s ease;
        border: none;
        font-size: 1rem;
        cursor: pointer;
        text-decoration: none;
    }

    .partidas-view .btn:hover {
        background-color: #c2185b;
        transform: scale(1.05);
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #383838;
    }

    .table-bordered {
        border: 1px solid #444;
    }

    .table td, .table th {
        border-color: #555;
        color: #fff;
    }

    .table th {
        background-color: #444;
        font-weight: 600;
    }
</style>

<div class="partidas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p style="text-align: center;">
        <?= Html::a('🏠 Volver a la página principal', ['index'], ['class' => 'btn']) ?>
        <?= Html::a('✏️ Editar', ['update', 'idpartidas' => $model->idpartidas], ['class' => 'btn']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table table-striped table-bordered'],
        'attributes' => [
            'idpartidas',
            'idjuegos',
            'nombre',
            'fechainicio',
            'fechafin',
            'nombre_equipo',
        ],
    ]) ?>

</div>




