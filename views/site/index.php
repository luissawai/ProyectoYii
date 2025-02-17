<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Bienvenido a la aplicación de gestión de juegos de rol</h1>
        <p class="lead">
            Explora un mundo de posibilidades donde podrás organizar y gestionar tus partidas de manera sencilla y eficiente. Con herramientas diseñadas para jugadores y directores de juego, nuestra plataforma te permite crear personajes, planificar aventuras y mantener un registro detallado de tus campañas. Sumérgete en la experiencia y lleva tu juego de rol al siguiente nivel.
        </p>
        <p>
            <a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Explorar</a>
        </p>
    </div>
    
    <div class="card-container">
        <!-- Tarjeta 1 -->
        <div class="card">
            <div class="card-body">
                <div class="content-container">
                    <div class="text-container">
                        <h5 class="card-title">Ver estadísticas de jugadores</h5>
                        <p class="card-text">Consulta las estadísticas de cada jugador</p>
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/mejor-ciclista-por-equipo']); ?>" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="card">
            <div class="card-body">
                <div class="content-container">
                    <div class="text-container">
                        <h5 class="card-title">Ver Calendario</h5>
                        <p class="card-text">Consulta las fechas de cada partida</p>
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/mejor-ciclista-por-equipo']); ?>" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    