<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\modulos $model */

$this->title = 'Update Modulos: ' . $model->idmodulos;
$this->params['breadcrumbs'][] = ['label' => 'Modulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmodulos, 'url' => ['view', 'idmodulos' => $model->idmodulos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modulos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
