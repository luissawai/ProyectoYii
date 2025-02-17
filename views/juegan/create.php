<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\juegan $model */

$this->title = 'Create Juegan';
$this->params['breadcrumbs'][] = ['label' => 'Juegans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="juegan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
