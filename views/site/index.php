<?php

/** @var yii\web\View $this */

use app\models\Personajes;
use app\models\Partidas;
use app\models\Jugadores;

$this->title = 'Gestión de Juegos de Rol';

// Obtener totales desde la base de datos
$totalPersonajes = Personajes::find()->count();
$totalPartidas = Partidas::find()->count();
$totalJugadores = Jugadores::find()->count();

?>
<div class="site-index">

    <!-- Primera sección: Imagen con texto superpuesto -->
    <div class="section hero-section text-center text-white">
        <div class="section-overlay">
            <h1 class="display-4">¡Lleva tus juegos de rol al siguiente nivel!</h1>
            <p class="lead">Organiza, gestiona y disfruta de tus partidas con nuestra plataforma.</p>
            <a href="<?= Yii::$app->urlManager->createUrl(['site/register']); ?>" class="btn btn-purple-start">
                <span>Comenzar ahora</span>
            </a>
        </div>
    </div>

    <!-- Segunda sección: Personajes -->
    <div class="section pj-section text-center text-white">
        <div class="section-overlay">
            <div class="col-md-12">
                <h2 class="mb-4">¡No te olvides de tus personajes!</h2>
                <p class="lead">Gestiona a los personajes de tus partidas de rol. Con <strong><?= Yii::$app->name ?></strong> tendrás a tu disposición sus nombres, la partida a la que pertenecen e incluso si es interpretado por un jugador o por ti.</p>
            </div>
        </div>
    </div>

    <!-- Tercera sección: Partidas -->
    <div class="section game-section text-center text-white">
        <div class="section-overlay">
            <div class="col-md-12">
                <h2 class="mb-4">Control total de tus partidas</h2>
                <p class="lead">Texto sobre partidas</p>
            </div>
        </div>
    </div>

    <!-- Cuarta sección: Jugadores -->
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h2 class="mb-4">Gestión de jugadores</h2>
                <p class="lead">Texto sobre jugadores</p>
            </div>
        </div>
    </div>

    <!-- Sección final: Tarjetas resumen -->
    <div class="container mt-5 mb-5">
        <h2 class="text-center mb-4">Resumen de la actividad</h2>
        <div class="row">
            <!-- Tarjeta 1: Total Personajes -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Personajes creados</h5>
                        <p class="display-4"><?= $totalPersonajes ?></p>
                    </div>
                </div>
            </div>
            <!-- Tarjeta 2: Total Partidas -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Partidas creadas</h5>
                        <p class="display-4"><?= $totalPartidas ?></p>
                    </div>
                </div>
            </div>
            <!-- Tarjeta 3: Total Jugadores -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Jugadores registrados</h5>
                        <p class="display-4"><?= $totalJugadores ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Secciones generales (hero, personajes, partidas) */
    .section {
        background-size: cover;
        background-position: center center;
        height: 450px;
        width: 100% !important;
        position: relative;
    }

    /* Fondo oscurecido y centrado de las secciones */
    .section-overlay {
        background-color: rgba(0, 0, 0, 0.6);
        padding: 20px;
        border-radius: 10px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Texto en secciones oscuras */
    .text-white h1,
    .text-white h2,
    .text-white p {
        color: white !important;
    }

    /* Imagen de fondo de la sección principal */
    .hero-section {
        background-image: url('<?= Yii::getAlias("@web/images/fondo-juego-mesa.jpg") ?>');
    }

    /* Imagen de fondo de la sección de personajes */
    .pj-section {
        background-image: url('<?= Yii::getAlias("@web/images/personajes.jpg") ?>');
    }

    /* Imagen de fondo de la sección de partidas (ajustada para que no se corte) */
    .game-section {
        background-image: url('<?= Yii::getAlias("@web/images/juegos.jpg") ?>');
        background-position: center top;
    }

    /* -------------------------------------------
       Botón romboide estrecho horizontalmente, sin bordes redondeados,
       mantiene altura y texto blanco incluso con brillo al hover.
       Centrado horizontalmente en su contenedor.
       ------------------------------------------- */
    .btn-purple-start {
        position: relative;
        display: inline-block;
        background-color: #5a189a;
        padding: 15px 10px; /* altura igual, menos ancho */
        max-width: 180px;   /* ancho máximo para controlar longitud */
        font-size: 1.2rem;
        border: none;
        border-radius: 0; /* sin bordes redondeados */
        overflow: hidden;
        transform: skewX(-20deg); /* forma romboide */
        transition: background-color 0.3s ease;
        cursor: pointer;
        text-align: center;
        white-space: nowrap; /* evita salto de línea en texto */
        margin: 0 auto; /* centrar horizontalmente */
    }

    /* Corregir distorsión del texto dentro del botón */
    .btn-purple-start span {
        display: inline-block;
        transform: skewX(20deg);
        color: white;
        font-weight: bold;
        width: 100%;
    }

    /* Brillo inicial */
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

    /* Animación del brillo al hacer hover */
    .btn-purple-start:hover::before {
        animation: shimmer 1.2s ease forwards;
    }

    /* Animación keyframes para brillo */
    @keyframes shimmer {
        0% { left: -75%; }
        100% { left: 130%; }
    }

    /* Cambio de color de fondo al hacer hover */
    .btn-purple-start:hover {
        background-color: #3c096c;
    }

    /* -------------------------------------------
       Estilos para tarjetas de resumen
       ------------------------------------------- */
    .card {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-title {
        font-weight: bold;
        color: #5a189a;
    }

    .display-4 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
    }
</style>
