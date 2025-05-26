<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\partidas $model */

$this->title = 'Crea tu partida';
?>
<div class="partidas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inicializar Flatpickr para la fecha de inicio
        flatpickr('#fecha-inicio', {
            dateFormat: 'Y-m-d', // Formato de fecha
            allowInput: true, // Permite escribir manualmente
        });

        // Inicializar Flatpickr para la fecha de fin
        flatpickr('#fecha-fin', {
            dateFormat: 'Y-m-d',
            allowInput: true,
        });
    });
</script>
<style>
    body {
        background-color: #2e2e2e;
        color: #ffffff;
    }

    .partidas-create {
        background-color: #2c2c2c;
        padding: 3rem;
        border-radius: 1rem;
        max-width: 800px;
        margin: 4rem auto;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
    }

    .partidas-create h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #ffffff;
        text-align: center;
        margin-bottom: 2rem;
    }

    .btn-guardar, .btn-atras {
    display: inline-block;
    padding: 0.8rem 1.5rem;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 0.5rem;
    text-decoration: none;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    border: none;
}

.btn-guardar {
    background-color: #e91e63;
    color: #ffffff;
}

.btn-guardar:hover {
    background-color: #d81b60;
    transform: scale(1.05);
}

.btn-atras {
    background-color: #4CAF50; /* Verde */
    color: #ffffff;
}
.btn-atras:hover {
    background-color: #43a047; /* Verde un poco más oscuro al pasar el ratón */
    transform: scale(1.05);
}


.btn-atras,
.btn-atras:visited,
.btn-atras:hover,
.btn-atras:active {
    text-decoration: none;
    color: #ffffff;
}

    

    .form-control {
        background-color: #3a3a3a;
        border: 1px solid #555;
        border-radius: 0.5rem;
        color: #ffffff;
        padding: 0.8rem 1rem;
        font-size: 1rem;
        width: 100%;
        transition: background-color 0.3s ease;
        height: 3.2rem;
        line-height: 1.4;
    }

    .form-control:focus {
        background-color: #555;
        border-color: #e91e63;
        box-shadow: 0 0 5px rgba(233, 30, 99, 0.8);
        color: #ffffff;
    }

    label {
        font-size: 1.1rem;
        color: #e0e0e0;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .form-control::placeholder {
        color: #d0d0d0;
    }

    .form-group {
        margin-bottom: 2rem;
    }
</style>
