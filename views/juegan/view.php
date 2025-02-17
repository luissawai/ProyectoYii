<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\juegan $model */

$this->title = $model->idjuegan;
$this->params['breadcrumbs'][] = ['label' => 'Juegans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="juegan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idjuegan' => $model->idjuegan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idjuegan' => $model->idjuegan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idjuegan',
            'idpartidas',
            'idjugadores',
        ],
    ]) ?>

</div>
