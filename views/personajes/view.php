<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Personajes $model */

$this->title = $model->idpersonajes;
$this->params['breadcrumbs'][] = ['label' => 'Personajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="personajes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idpersonajes' => $model->idpersonajes], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idpersonajes' => $model->idpersonajes], [
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
        'idpersonajes',
        'idjugadores',
        'nombre',
        [
            'attribute' => 'master',
            'value' => $model->masterText, // Usa la función del modelo
        ],
    ],
]) ?>


</div>

