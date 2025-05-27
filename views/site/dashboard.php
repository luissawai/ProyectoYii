<?php

use yii\helpers\Html;

$this->title = 'Dashboard';
?>

<div class="dashboard-container">
    <div class="welcome-section mb-4">
        <h1 class="text-3xl font-medieval mb-2">Bienvenido, <?= Html::encode(Yii::$app->user->identity->username) ?></h1>
        <p class="text-gray-400">Panel de control de tu cuenta</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Tarjeta de Personajes -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold mb-4">Mis Personajes</h3>
            <p class="text-gray-600 mb-4">Administra tus personajes activos</p>
            <?= Html::a('Ver Personajes', ['/personajes/index'], ['class' => 'btn btn-purple']) ?>
        </div>

        <!-- Tarjeta de Partidas -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold mb-4">Mis Partidas</h3>
            <p class="text-gray-600 mb-4">Revisa tus partidas en curso</p>
            <?= Html::a('Ver Partidas', ['/partidas/index'], ['class' => 'btn btn-purple']) ?>
        </div>

        <!-- Tarjeta de Perfil -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold mb-4">Mi Perfil</h3>
            <p class="text-gray-600 mb-4">Actualiza tu información</p>
            <?= Html::a('Editar Perfil', ['/site/profile'], ['class' => 'btn btn-purple']) ?>
        </div>
    </div>
</div>

<style>
    .dashboard-container {
        background-color: #f8f9fa;
        padding: 2rem;
        border-radius: 0.5rem;
        margin-top: 2rem;
        max-width: 1450px;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
    }


    .welcome-section {
        background-color: rgb(31, 21, 34);
        color: white;
        padding: 2rem;
        border-radius: 0.5rem;
        margin-bottom: 2rem;
        max-width: 100%;
    }

    .card-dashboard {
        background: white;
        border-radius: 0.5rem;
        padding: 1.5rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card-dashboard:hover {
        transform: translateY(-5px);
    }

    .grid {
        max-width: 100%;
        margin: 0 auto;
    }

    @media (max-width: 1450px) {
        .dashboard-container {
            margin: 2rem 1rem;
            width: calc(100% - 2rem);
        }
    }
</style>