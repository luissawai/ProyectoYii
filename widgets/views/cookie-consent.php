<?php
use yii\helpers\Html;
?>

<?= Html::csrfMetaTags() ?>

<!-- Fondo oscuro -->
<div id="modalOverlay" class="modal-overlay"></div>

<!-- Modal Inicial -->
<div id="cookieConsentModal" class="cookie-modal-consent">
    <div class="cookie-modal-header">
        <h5>Consentimiento de Cookies</h5>
    </div>
    <div class="cookie-modal-body">
        <p>Este sitio web utiliza cookies propias y de terceros para mejorar nuestros servicios y mostrarle publicidad relacionada con sus preferencias.</p>
    </div>
    <div class="cookie-modal-footer">
        <button class="btn-cookie btn-reject rechazar-todas-cookies">Rechazar todo</button>
        <button class="btn-cookie btn-accept aceptar-todas-cookies">Aceptar todo</button>
        <button class="btn-cookie btn-reject" id="abrirConfiguracionCookies">Configurar</button>
    </div>
</div>

<!-- Modal Configuración -->
<div id="cookieSettingsModal" class="cookie-modal-settings">
    <div class="cookie-modal-header">
        <h5>Configuración de cookies</h5>
    </div>
    <div class="cookie-modal-body">
        <div class="cookie-section">
            <div class="cookie-section-header">
                <span>Cookies necesarias</span>
                <label class="cookie-switch">
                    <input type="checkbox" checked disabled>
                    <span class="slider"></span>
                </label>
            </div>
            <p>Son esenciales para el funcionamiento del sitio web.</p>
        </div>
        <div class="cookie-section">
            <div class="cookie-section-header">
                <span>Cookies analíticas</span>
                <label class="cookie-switch">
                    <input type="checkbox" name="cookies[analiticas]" value="1">
                    <span class="slider"></span>
                </label>
            </div>
            <p>Nos ayudan a entender cómo utilizas el sitio.</p>
        </div>
        <div class="cookie-section">
            <div class="cookie-section-header">
                <span>Cookies funcionales</span>
                <label class="cookie-switch">
                    <input type="checkbox" name="cookies[funcionales]" value="1">
                    <span class="slider"></span>
                </label>
            </div>
            <p>Permiten funcionalidades adicionales y personalización.</p>
        </div>
        <div class="cookie-section">
            <div class="cookie-section-header">
                <span>Cookies de publicidad</span>
                <label class="cookie-switch">
                    <input type="checkbox" name="cookies[publicidad]" value="1">
                    <span class="slider"></span>
                </label>
            </div>
            <p>Se utilizan para mostrar publicidad relevante.</p>
        </div>
    </div>
    <div class="cookie-modal-footer">
        <button type="button" class="btn-cookie btn-reject" id="volverConfiguracion">Volver</button>
        <button type="button" class="btn-cookie btn-accept" id="guardarConfiguracion">Guardar configuración</button>
    </div>
</div>
