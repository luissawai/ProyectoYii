<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\clases $model */

$this->title = 'Create Clases';
$this->params['breadcrumbs'][] = ['label' => 'Clases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clases-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
