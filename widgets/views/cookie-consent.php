<?php
use yii\helpers\Html;
use yii\helpers\Url;

$csrf = Html::csrfMetaTags();
?>

<?= $csrf ?>

<!-- Fondo oscuro -->
<div id="modalOverlay" class="modal-overlay" style="display:block;"></div>

<!-- MODAL PRINCIPAL -->
<div id="cookieConsentModal" class="cookie-modal-consent">
    <div class="cookie-modal-header">
        <h5>Este sitio usa cookies</h5>
    </div>
    <div class="cookie-modal-body">
        <p>Utilizamos cookies para mejorar tu experiencia. Puedes aceptarlas todas, configurarlas o rechazar las no necesarias.</p>
    </div>
    <div class="cookie-modal-footer">
        <!-- Rechazar -->
        <form method="post" action="<?= Url::to(['/site/consentimiento-cookies']) ?>">
            <?= Html::hiddenInput('consentimiento', 'rechazado') ?>
            <?= Html::hiddenInput('cookies[necesarias]', '1') ?>
            <?= Html::hiddenInput('cookies[analiticas]', '0') ?>
            <?= Html::hiddenInput('cookies[funcionales]', '0') ?>
            <?= Html::hiddenInput('cookies[publicidad]', '0') ?>
            <?= Html::submitButton('Rechazar todo', ['class' => 'btn-cookie btn-reject']) ?>
        </form>

        <!-- Aceptar -->
        <form method="post" action="<?= Url::to(['/site/consentimiento-cookies']) ?>">
            <?= Html::hiddenInput('consentimiento', 'aceptado') ?>
            <?= Html::hiddenInput('cookies[necesarias]', '1') ?>
            <?= Html::hiddenInput('cookies[analiticas]', '1') ?>
            <?= Html::hiddenInput('cookies[funcionales]', '1') ?>
            <?= Html::hiddenInput('cookies[publicidad]', '1') ?>
            <?= Html::submitButton('Aceptar todo', ['class' => 'btn-cookie btn-accept']) ?>
        </form>

        <!-- Configurar -->
        <a href="#cookieSettingsModal" class="btn-cookie btn-reject">Configurar</a>
    </div>
</div>

<!-- MODAL DE CONFIGURACIÓN -->
<div id="cookieSettingsModal" class="cookie-modal-settings">
    <div class="cookie-modal-header">
        <h5>Configuración de cookies</h5>
    </div>
    <div class="cookie-modal-body">
        <p>Selecciona qué tipo de cookies deseas permitir:</p>

        <form method="post" action="<?= Url::to(['/site/consentimiento-cookies']) ?>">
            <?= Html::hiddenInput('consentimiento', 'personalizado') ?>

            <p><label><input type="checkbox" name="cookies[analiticas]" value="1"> Cookies analíticas</label></p>
            <p><label><input type="checkbox" name="cookies[funcionales]" value="1"> Cookies funcionales</label></p>
            <p><label><input type="checkbox" name="cookies[publicidad]" value="1"> Cookies de publicidad</label></p>

            <?= Html::hiddenInput('cookies[necesarias]', '1') ?>

            <div class="cookie-modal-footer">
                <?= Html::submitButton('Guardar configuración', ['class' => 'btn-cookie btn-accept']) ?>
                <a href="#cookieConsentModal" class="btn-cookie btn-reject">Volver</a>
            </div>
        </form>
    </div>
</div>

<!-- ESTILOS (puedes moverlos a tu asset o widget) -->
<style>
.modal-overlay {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9990;
}

.cookie-modal-consent, .cookie-modal-settings {
    position: fixed;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    z-index: 9991;
}

.cookie-modal-consent:target,
.cookie-modal-settings:target {
    display: block;
}

.cookie-modal-header h5 {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
}

.cookie-modal-body p {
    margin-bottom: 1em;
}

.cookie-modal-footer {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5em;
    justify-content: flex-end;
}

.btn-cookie {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    border: none;
    cursor: pointer;
    font-size: 0.9rem;
    text-decoration: none;
    text-align: center;
    display: inline-block;
}

.btn-accept {
    background-color: #07608e;
    color: white;
}

.btn-reject {
    background-color: #f0f0f0;
    color: #333;
}
</style>
