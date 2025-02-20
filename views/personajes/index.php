<?php

use app\models\Personajes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Personajes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personajes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Personaje', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            
            [
                'attribute' => 'jugadorNombre',
                'label' => 'Nombre del Jugador',
                'value' => function ($model) {
                    return $model->jugador ? $model->jugador->nombre : '(Sin jugador)';
                },
            ],
            'nombre',
            [
                'attribute' => 'clases',
                'label' => 'Clases',
                'value' => function ($model) {
                    return $model->clasesTexto; // Llama a la nueva función del modelo
                },
            ],
            [
                'attribute' => 'master',
                'label' => '¿Es master?',
                'value' => function ($model) {
                    return $model->masterText; // Usa la función del modelo
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Personajes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idpersonajes' => $model->idpersonajes]);
                }
            ],
        ],
    ]); ?>
</div>
