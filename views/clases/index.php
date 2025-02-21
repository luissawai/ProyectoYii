<?php

use app\models\Clases; // Asegurar que el modelo tiene el nombre correcto
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clases-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clases', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'idnombre', 
                'label' => 'Nombre del Personaje', 
                'value' => function($model) {
                    return $model->personaje->nombre ?? '(Sin Nombre)'; // Prevenir errores si la relación es nula
                }
            ],
            'clases',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Clases $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->idpersonajes]); // 'id' en lugar de 'idpersonajes' y 'clases'
                }
            ],
        ],
    ]); ?>

</div>
