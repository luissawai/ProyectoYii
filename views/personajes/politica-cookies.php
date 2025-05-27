<?php
use yii\helpers\Html;

$this->title = 'Política de Cookies';
?>

<div class="site-politica-cookies">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="content">
        <h2>¿Qué son las cookies?</h2>
        <p>Las cookies son pequeños archivos de texto que se almacenan en su dispositivo cuando visita nuestro sitio web.</p>

        <h2>Tipos de cookies que utilizamos</h2>
        
        <h3>Cookies Necesarias</h3>
        <p>Son absolutamente esenciales para el funcionamiento del sitio web. Estas cookies garantizan funcionalidades básicas y características de seguridad del sitio web.</p>
        
        <h3>Cookies Analíticas</h3>
        <p>Nos ayudan a entender cómo los visitantes interactúan con el sitio web. Esta información se utiliza para mejorar el sitio.</p>
        
        <h3>Cookies Funcionales</h3>
        <p>Permiten recordar las elecciones que realiza (como su nombre de usuario o idioma) y proporcionan características mejoradas y más personales.</p>
        
        <h3>Cookies de Publicidad</h3>
        <p>Se utilizan para ofrecer publicidad más relevante para usted y sus intereses.</p>

        <h2>Gestión de cookies</h2>
        <p>Puede ajustar sus preferencias de cookies en cualquier momento usando nuestro panel de configuración de cookies:</p>
        <?= Html::button('Configurar Cookies', [
            'class' => 'btn btn-primary',
            'onclick' => 'window.location.reload()'
        ]) ?>
    </div>
</div>