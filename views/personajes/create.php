<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Personajes $model */

$this->title = 'Create Personajes';
$this->params['breadcrumbs'][] = ['label' => 'Personajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personajes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
