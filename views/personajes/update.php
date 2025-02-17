<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Personajes $model */

$this->title = 'Update Personajes: ' . $model->idpersonajes;
$this->params['breadcrumbs'][] = ['label' => 'Personajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpersonajes, 'url' => ['view', 'idpersonajes' => $model->idpersonajes]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personajes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
