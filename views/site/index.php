<?php

/** @var yii\web\View $this */

use app\models\Personajes;
use app\models\Partidas;
use app\models\Jugadores;

$this->title = 'Gestión de Juegos de Rol';

// Estadísticas generales
$totalPersonajes = Personajes::find()->count();
$totalPartidas = Partidas::find()->count();
$totalJugadores = Jugadores::find()->count();

// Categorías para la sección de tarjetas con imagen de fondo
$categorias = [
    ['nombre' => 'Módulos', 'img' => 'modulos.jpg'],
    ['nombre' => 'Partidas', 'img' => 'partidas.jpg'],
    ['nombre' => 'Jugadores', 'img' => 'jugadores.jpg'],
    ['nombre' => 'Juegos', 'img' => 'juegos.jpg'],
    ['nombre' => 'Clases', 'img' => 'clases.jpg'],
    ['nombre' => 'Personajes', 'img' => 'personajes.jpg'],
];
?>

<div class="site-index">

    <!-- HERO SECTION (Presentación principal con fondo e imagen) -->
    <div class="section hero-section text-white text-center">
        <div class="section-overlay d-flex flex-column justify-content-center align-items-center">
            <h1 class="display-4 text-white">¡LLEVA TUS JUEGOS DE ROL AL SIGUIENTE NIVEL!</h1>
            <p class="lead text-white">Organiza, gestiona y disfruta de tus partidas con nuestra plataforma.</p>
            <a href="<?= Yii::$app->urlManager->createUrl(['site/register']); ?>" class="btn btn-purple-start mt-3">
                <span>Comenzar ahora</span>
            </a>
        </div>
    </div>

    <!-- CATEGORÍAS (Tarjetas romboides con imagen de fondo) -->
    <div class="container mt-5 mb-5">
        <div class="section-header text-white text-center mb-4">
            <hr class="section-line">
            <h2 class="text-uppercase d-inline mx-3">Categorías</h2>
            <hr class="section-line">
        </div>
        <div class="categoria-wrapper d-flex justify-content-center flex-wrap">
            <?php foreach ($categorias as $cat): ?>
                <div class="categoria-card" style="background-image: url('<?= Yii::getAlias("@web/images/{$cat['img']}") ?>');">
                    <div class="categoria-overlay">
                        <h3 class="categoria-title"><?= $cat['nombre'] ?></h3>
                        <p class="categoria-text">Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- INFORMACIÓN -->
    <div class="section info-section text-center text-white">
        <div class="section-overlay">
            <div class="section-header mb-4">
                <hr class="section-line">
                <h2 class="text-uppercase d-inline mx-3">Información</h2>
                <hr class="section-line">
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-3">
                    <div class="card bg-dark text-white p-3 h-100 text-center">
                        <div class="mb-2"><i class="bi bi-person fs-1"></i></div>
                        <h5 class="card-title">Crea una cuenta</h5>
                        <p>Crea tu cuenta de manera gratuita. No es necesario descargar, ni instalar nada.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-dark text-white p-3 h-100 text-center">
                        <div class="mb-2"><i class="bi bi-grid fs-1"></i></div>
                        <h5 class="card-title">No olvides tus partidas</h5>
                        <p>Guarda tus partidas, personajes y jugadores para no perder el hilo.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-dark text-white p-3 h-100 text-center">
                        <div class="mb-2">🎲</div>
                        <h5 class="card-title">Añade el juego que quieras</h5>
                        <p>Desde Vampiro hasta D&D, guarda cualquier juego de rol.</p>
                    </div>
                </div>
            </div>
            <a href="<?= Yii::$app->urlManager->createUrl(['site/register']); ?>" class="btn btn-purple-start mt-4">
                <span>Registrarse</span>
            </a>
        </div>
    </div>

    <!-- TARJETAS DE RESUMEN -->
    <div class="container mt-5 mb-5">
        <div class="section-header text-white text-center mb-4">
            <hr class="section-line">
            <h2 class="text-uppercase d-inline mx-3">Actividad General</h2>
            <hr class="section-line">
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow">
                    <div class="card-body">
                        <h5 class="card-title">Personajes creados</h5>
                        <p class="display-4 resumen-number"><?= $totalPersonajes ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow">
                    <div class="card-body">
                        <h5 class="card-title">Partidas registradas</h5>
                        <p class="display-4 resumen-number"><?= $totalPartidas ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow">
                    <div class="card-body">
                        <h5 class="card-title">Jugadores activos</h5>
                        <p class="display-4 resumen-number"><?= $totalJugadores ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ESTILOS PERSONALIZADOS -->
<style>
    body {
        background-color: #1a1a1a;
    }

    /* HERO Section */
    .hero-section {
        background-image: url('<?= Yii::getAlias("@web/images/fondo-juego-mesa.jpg") ?>');
        height: 350px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .section-overlay {
        background-color: rgba(0, 0, 0, 0.6);
        padding: 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Botón */
    .btn-purple-start {
        position: relative;
        display: inline-block;
        background-color: #5a189a;
        padding: 15px 10px;
        max-width: 180px;
        font-size: 1.2rem;
        border: none;
        border-radius: 0;
        overflow: hidden;
        transform: skewX(-20deg);
        transition: background-color 0.3s ease;
        cursor: pointer;
        text-align: center;
        white-space: nowrap;
        margin: 0 auto;
    }

    .btn-purple-start span {
        display: inline-block;
        transform: skewX(20deg);
        color: white;
        font-weight: bold;
        width: 100%;
    }

    .btn-purple-start::before {
        content: '';
        position: absolute;
        top: 0;
        left: -75%;
        width: 50%;
        height: 100%;
        background: linear-gradient(120deg, rgba(255,255,255,0.2), rgba(255,255,255,0.6), rgba(255,255,255,0.2));
        transform: skewX(-20deg);
    }

    .btn-purple-start:hover::before {
        animation: shimmer 1.2s ease forwards;
    }

    @keyframes shimmer {
        0% { left: -75%; }
        100% { left: 130%; }
    }

    .btn-purple-start:hover {
        background-color: #3c096c;
    }

    /* Sección Categorías */
    .categoria-wrapper {
        gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    .categoria-card {
        width: 180px;
        height: 180px;
        background-size: cover;
        background-position: center;
        position: relative;
        clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
        transition: transform 0.3s ease, z-index 0.3s ease;
        cursor: pointer;
    }

    .categoria-card:hover {
        z-index: 2;
        transform: scale(1.1);
    }

    .categoria-card.active {
        transform: scale(1.3);
        z-index: 3;
    }

    .categoria-overlay {
        position: absolute;
        inset: 0;
        background-color: rgba(255, 255, 255, 0.1);
        clip-path: inherit;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
        padding: 1rem;
    }

    .categoria-title {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .categoria-text {
        font-size: 0.9rem;
        margin-top: 0.5rem;
        display: none;
    }
    .categoria-card.active .categoria-text {
        display: block;
    }

    /* Encabezados de sección con líneas */
    .section-header h2 {
        font-size: 1.8rem;
        font-weight: bold;
        color: #fff;
    }

    .section-line {
        display: inline-block;
        width: 100px;
        height: 2px;
        background-color: #5a189a;
        vertical-align: middle;
    }

    /* Tarjetas de resumen */
    .resumen-number {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333 !important;
    }

    /* Info Section */
    .info-section {
        background-color: #1a1a1a;
        padding-bottom: 3rem;
    }
</style>

<!-- JS para activar tarjetas -->
<script>
    document.querySelectorAll('.categoria-card').forEach(card => {
        card.addEventListener('click', () => {
            card.classList.toggle('active');
        });
    });
</script>
