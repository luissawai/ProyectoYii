<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Búsqueda</h1>

<?php $form = ActiveForm::begin(['method' => 'get', 'action' => ['site/search']]); ?>
    <?= Html::input('text', 'q', $query ?? '', ['placeholder' => 'Buscar por nombre...', 'class' => 'form-control']) ?>
    <br>
    <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>

<?php if (isset($results)): ?>
    <h2>Resultados</h2>
    <?php if (empty($results) || !array_filter($results)): ?>
        <p>No se encontraron resultados para <strong><?= Html::encode($query) ?></strong>.</p>
    <?php else: ?>

        <?php if (!empty($results['jugadores'])): ?>
            <h3>Jugadores</h3>
            <ul>
                <?php foreach ($results['jugadores'] as $jugador): ?>
                    <li><strong><?= Html::encode($jugador->nombre) ?></strong> (Rol: <?= Html::encode($jugador->rol) ?>)</li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if (!empty($results['personajes'])): ?>
            <h3>Personajes</h3>
            <ul>
                <?php foreach ($results['personajes'] as $pj): ?>
                    <li>
                        <strong><?= Html::encode($pj->nombre) ?></strong>
                        - Jugador: <?= Html::encode($pj->jugador ? $pj->jugador->nombre : 'Desconocido') ?>
                        - Master: <?= $pj->getMasterText() ?>
                        - Clases: <?= Html::encode($pj->getClasesTexto()) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if (!empty($results['juegos'])): ?>
            <h3>Juegos</h3>
            <ul>
                <?php foreach ($results['juegos'] as $juego): ?>
                    <li><strong><?= Html::encode($juego->nombre) ?></strong> (Temática: <?= Html::encode($juego->tematica) ?>, Edición: <?= Html::encode($juego->edicion) ?>)</li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if (!empty($results['modulos'])): ?>
            <h3>Módulos</h3>
            <ul>
                <?php foreach ($results['modulos'] as $mod): ?>
                    <li>
                        <strong><?= Html::encode($mod->nombre) ?></strong>
                        (Edición: <?= Html::encode($mod->edicion) ?>,
                        Juego: <?= Html::encode($mod->juego ? $mod->juego->nombre : 'Desconocido') ?>)
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if (!empty($results['partidas'])): ?>
            <h3>Partidas</h3>
            <ul>
                <?php foreach ($results['partidas'] as $partida): ?>
                    <li>
                        <strong><?= Html::encode($partida->nombre) ?></strong>
                        (Equipo: <?= Html::encode($partida->nombre_equipo) ?>,
                        Juego: <?= Html::encode($partida->juego ? $partida->juego->nombre : 'Desconocido') ?>,
                        Fechas: <?= Html::encode($partida->fechainicio) ?> - <?= Html::encode($partida->fechafin) ?>)
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    <?php endif; ?>
<?php endif; ?>
