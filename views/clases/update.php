<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\clases $model */

$this->title = 'Update Clases: ' . $model->idpersonajes;
$this->params['breadcrumbs'][] = ['label' => 'Clases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpersonajes, 'url' => ['view', 'idpersonajes' => $model->idpersonajes, 'clases' => $model->clases]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clases-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
