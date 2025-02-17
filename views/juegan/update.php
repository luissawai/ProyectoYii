<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\juegan $model */

$this->title = 'Update Juegan: ' . $model->idjuegan;
$this->params['breadcrumbs'][] = ['label' => 'Juegans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjuegan, 'url' => ['view', 'idjuegan' => $model->idjuegan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="juegan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
