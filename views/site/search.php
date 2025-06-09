<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Búsqueda';

?>

<div class="busqueda-container">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['site/search'],
        'options' => ['class' => 'form-busqueda']
    ]); ?>

        <?= Html::input('text', 'q', $query ?? '', [
            'placeholder' => 'Buscar por nombre...',
            'class' => 'form-control'
        ]) ?>

        <?= Html::submitButton('Buscar', ['class' => 'btn']) ?>

    <?php ActiveForm::end(); ?>

    <?php if (isset($results)): ?>
        <div class="resultados">
            <h2 class="titulo-resultados">🎯 Resultados</h2>

            <?php if (empty($results) || !array_filter($results)): ?>
                <p class="no-result">No se encontraron resultados para <strong><?= Html::encode($query) ?></strong>.</p>
            <?php else: ?>

                <?php if (!empty($results['jugadores'])): ?>
                    <div class="seccion">
                        <h3>🎲 Jugadores</h3>
                        <?php foreach ($results['jugadores'] as $jugador): ?>
                            <a href="<?= Url::to(['jugadores/view', 'idjugadores' => $jugador->idjugadores]) ?>" class="resultado-card-link">
                                <div class="resultado-card">
                                    <strong><?= Html::encode($jugador->nombre) ?></strong><br>
                                    Rol: <?= Html::encode($jugador->rol) ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($results['personajes'])): ?>
                    <div class="seccion">
                        <h3>🧙 Personajes</h3>
                        <?php foreach ($results['personajes'] as $pj): ?>
                            <a href="<?= Url::to(['personajes/view', 'idpersonajes' => $pj->idpersonajes]) ?>" class="resultado-card-link">
                                <div class="resultado-card">
                                    <strong><?= Html::encode($pj->nombre) ?></strong><br>
                                    Jugador: <?= Html::encode($pj->jugador ? $pj->jugador->nombre : 'Desconocido') ?><br>
                                    Master: <?= Html::encode($pj->getMasterText()) ?><br>
                                    Clases: <?= Html::encode($pj->getClasesTexto()) ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($results['juegos'])): ?>
                    <div class="seccion">
                        <h3>🎮 Juegos</h3>
                        <?php foreach ($results['juegos'] as $juego): ?>
                            <a href="<?= Url::to(['juegos/view', 'idjuegos' => $juego->idjuegos]) ?>" class="resultado-card-link">
                                <div class="resultado-card">
                                    <strong><?= Html::encode($juego->nombre) ?></strong><br>
                                    Temática: <?= Html::encode($juego->tematica) ?><br>
                                    Edición: <?= Html::encode($juego->edicion) ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($results['modulos'])): ?>
                    <div class="seccion">
                        <h3>📦 Módulos</h3>
                        <?php foreach ($results['modulos'] as $mod): ?>
                            <a href="<?= Url::to(['modulos/view', 'idmodulos' => $mod->idmodulos]) ?>" class="resultado-card-link">
                                <div class="resultado-card">
                                    <strong><?= Html::encode($mod->nombre) ?></strong><br>
                                    Edición: <?= Html::encode($mod->edicion) ?><br>
                                    Juego: <?= Html::encode($mod->juego ? $mod->juego->nombre : 'Desconocido') ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($results['partidas'])): ?>
                    <div class="seccion">
                        <h3>⚔️ Partidas</h3>
                        <?php foreach ($results['partidas'] as $partida): ?>
                            <a href="<?= Url::to(['partidas/view', 'idpartidas' => $partida->idpartidas]) ?>" class="resultado-card-link">
                                <div class="resultado-card">
                                    <strong><?= Html::encode($partida->nombre) ?></strong><br>
                                    Equipo: <?= Html::encode($partida->nombre_equipo) ?><br>
                                    Juego: <?= Html::encode($partida->juego ? $partida->juego->nombre : 'Desconocido') ?><br>
                                    Fechas: <?= Html::encode($partida->fechainicio) ?> - <?= Html::encode($partida->fechafin) ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<style>
    body {
        background-color: #2e2e2e;
        color: #ffffff;
        margin-top: 0;
    }

    .busqueda-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .busqueda-container h1 {
        font-size: 3.5rem;
        font-weight: 800;
        color: #ffffff;
        text-align: center;
        margin-bottom: 2rem;
    }

    .form-busqueda {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        margin-bottom: 3rem;
    }

    .form-busqueda input[type="text"] {
        max-width: 500px;
        width: 100%;
        padding: 0.8rem 1rem;
        border-radius: 0.8rem;
        border: none;
        font-size: 1rem;
    }

    .form-busqueda button {
        background-color: #e91e63;
        color: white;
        font-weight: 600;
        padding: 0.8rem 2rem;
        border-radius: 1rem;
        border: none;
        font-size: 1.1rem;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .form-busqueda button:hover {
        background-color: #c2185b;
        transform: scale(1.05);
    }

    .titulo-resultados {
        font-size: 2.8rem;
        color: #ff4081;
        font-weight: 900;
        text-align: center;
        margin-bottom: 2rem;
        border-bottom: 2px solid #ff4081;
        padding-bottom: 0.5rem;
    }

    .resultados h3 {
        background-color: rgba(255, 255, 255, 0.08);
        padding: 0.8rem 1rem;
        border-radius: 0.5rem;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-size: 1.5rem;
        font-weight: bold;
        border-left: 5px solid #e91e63;
    }

    .resultado-card-link {
        text-decoration: none;
        color: inherit;
    }

    .resultado-card {
        background-color: #f5f5f5;
        color: #333;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        margin-top: 1rem;
        margin-bottom: 1.5rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .resultado-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.4);
    }

    .resultado-card strong {
        font-weight: 700;
    }

    .no-result {
        color: #ff5252;
        font-weight: 600;
        font-size: 1.2rem;
        text-align: center;
    }

    .seccion {
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        padding-bottom: 2rem;
        margin-bottom: 2rem;
    }
</style>
