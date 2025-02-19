<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\jugadores $model */

$this->title = 'Crea tu jugador';
$this->params['breadcrumbs'][] = ['label' => 'Jugadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jugadores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
