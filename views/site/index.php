<?php

/** @var yii\web\View $this */

$this->title = 'Gestión de Juegos de Rol';
?>
<div class="site-index">

    <!-- Primera sección: Imagen con texto superpuesto -->
    <div class="hero-section text-center text-white">
        <div class="hero-overlay">
            <h1 class="display-4">¡Lleva tus juegos de rol al siguiente nivel!</h1>
            <p class="lead">Organiza, gestiona y disfruta de tus partidas con nuestra plataforma.</p>
            <a href="<?= Yii::$app->urlManager->createUrl(['site/register']); ?>" class="btn btn-purple-start btn-lg">Comenzar ahora</a>
        </div>
    </div>

    <!-- Segunda sección: Tarjetas -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Explora nuestras funcionalidades</h2>
        <div class="row">
            <!-- Tarjeta 1 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Estadísticas de jugadores</h5>
                        <p class="card-text">Consulta y analiza el rendimiento de cada jugador en tus partidas.</p>
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/estadisticas']); ?>" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta 2 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Calendario de partidas</h5>
                        <p class="card-text">Organiza y consulta las fechas de tus próximas aventuras.</p>
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/calendario']); ?>" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta 3 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestión de personajes</h5>
                        <p class="card-text">Crea y administra personajes para tus campañas de rol.</p>
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/personajes']); ?>" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tercera sección: Tabla de datos -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Últimos registros</h2>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Jugador</th>
                    <th scope="col">Partida</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Puntuación</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juan Pérez</td>
                    <td>Aventura en el bosque</td>
                    <td>2025-05-07</td>
                    <td>95</td>
                </tr>
                <tr>
                    <td>María López</td>
                    <td>El castillo perdido</td>
                    <td>2025-05-06</td>
                    <td>88</td>
                </tr>
                <tr>
                    <td>Carlos García</td>
                    <td>La cueva del dragón</td>
                    <td>2025-05-05</td>
                    <td>92</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<style>
    /* Primera sección: Hero */
    .hero-section {
        background-image: url('<?= Yii::getAlias("@web/images/fondo-juego-mesa.jpg") ?>'); /* Genera la URL completa */
        background-size: cover; /* Asegura que la imagen cubra toda la sección */
        background-position: center; /* Centra la imagen */
        height: 450px;
        width: 100% !important;/* Ocupa el 100% de la altura de la ventana */   
     }
    
    .hero-overlay {
        background-color: rgba(0, 0, 0, 0.6); /* Oscurece la imagen de fondo */
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        height: 450px;
        max-width: 100%; /* Limita el ancho del contenido */
    }

    .hero-section h1 {
        padding-top: 50px;
        font-size: 3rem; /* Tamaño grande para el título */
        font-weight: bold;
        margin-bottom: 20px;
        color: white !important;
    }

    .hero-section p {
        padding-top: 20px;
        font-size: 1.5rem; /* Tamaño más grande para el texto descriptivo */
        margin-bottom: 30px;
        color: white !important;
    }

    .btn-purple {
        background-color: #5a189a; /* Morado oscuro */
        color: white;
        border-radius: 50px;
        padding: 15px 30px;
        font-size: 1.2rem;
        text-transform: uppercase;
    }

    .btn-purple-start{
        background-color: #5a189a; /* Morado oscuro */
        color: white;
        border-radius: 50px;
        padding: 15px 30px;
        font-size: 1.2rem;
        text-transform: uppercase;
    }

    .btn-purple:hover {
        background-color: #3c096c; /* Morado más oscuro al pasar el mouse */
        color: white;
    }

    /* Tarjetas */
    .card {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-title {
        color: var(--secondary-color);
        font-weight: bold;
    }

    /* Tabla */
    .table {
        margin-top: 20px;
    }

    .table th,
    .table td {
        text-align: center;
    }
</style>