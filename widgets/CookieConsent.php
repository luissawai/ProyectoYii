<?php

namespace app\widgets;

use yii\base\Widget;
use Yii;

class CookieConsent extends Widget
{
    public function run()
    {
        if (!Yii::$app->request->cookies->has('consentimiento_cookies')) {
            $this->registerAssets();
            return $this->render('cookie-consent');
        }
        return '';
    }

    protected function registerAssets()
    {
        $view = $this->getView();

        // Estilos CSS
        $view->registerCss("
            .modal-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 9998;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }
            
            .cookie-modal-consent,
            .cookie-modal-settings {
                position: fixed;
                left: 50%;
                background: white;
                width: 90%;
                max-width: 500px;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                z-index: 9999;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }

            .cookie-modal-consent {
                bottom: -100%;
                transform: translateX(-50%);
            }

            .cookie-modal-settings {
                top: 50%;
                transform: translate(-50%, -50%) scale(0.95);
                max-width: 600px;
                max-height: 80vh;
                overflow-y: auto;
            }

            .modal-visible {
                opacity: 1 !important;
                visibility: visible !important;
            }

            .cookie-modal-consent.modal-visible {
                bottom: 20px;
            }

            .cookie-modal-settings.modal-visible {
                transform: translate(-50%, -50%) scale(1);
            }

            .btn-cookie {
                margin: 5px;
                padding: 8px 12px;
                border-radius: 4px;
                border: none;
                cursor: pointer;
            }

            .btn-accept {
                background-color: #4CAF50;
                color: white;
            }

            .btn-reject {
                background-color: #f44336;
                color: white;
            }

            .cookie-switch {
                position: relative;
                display: inline-block;
                width: 40px;
                height: 20px;
            }

            .cookie-switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                border-radius: 20px;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: '';
                height: 14px;
                width: 14px;
                left: 3px;
                bottom: 3px;
                background-color: white;
                border-radius: 50%;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: #2196F3;
            }

            input:checked + .slider:before {
                transform: translateX(20px);
            }
        ");

        // JavaScript
        $view->registerJs(<<<JS
        document.addEventListener('DOMContentLoaded', function() {
            const modalInicial = document.getElementById('cookieConsentModal');
            const modalConfiguracion = document.getElementById('cookieSettingsModal');
            const overlay = document.getElementById('modalOverlay');
            
            function showModal(modal) {
                overlay.classList.add('modal-visible');
                modal.classList.add('modal-visible');
                document.body.style.overflow = 'hidden';
            }
            
            function hideModal(modal) {
                modal.classList.remove('modal-visible');
                if (!modalInicial.classList.contains('modal-visible') && 
                    !modalConfiguracion.classList.contains('modal-visible')) {
                    overlay.classList.remove('modal-visible');
                    document.body.style.overflow = '';
                }
            }
            
            function savePreferences(preferences) {
                return fetch('/site/consentimiento-cookies', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(preferences)
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        hideModal(modalInicial);
                        hideModal(modalConfiguracion);
                        location.reload();
                    } else {
                        throw new Error(result.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ha ocurrido un error al guardar las preferencias');
                });
            }
            
            showModal(modalInicial);
            
            document.getElementById('abrirConfiguracionCookies')?.addEventListener('click', function(e) {
                e.preventDefault();
                hideModal(modalInicial);
                setTimeout(() => showModal(modalConfiguracion), 300);
            });
            
            document.getElementById('volverConfiguracion')?.addEventListener('click', function() {
                hideModal(modalConfiguracion);
                setTimeout(() => showModal(modalInicial), 300);
            });
            
            document.querySelectorAll('.aceptar-todas-cookies').forEach(btn => {
                btn.addEventListener('click', () => {
                    savePreferences({
                        consentimiento: 'aceptado',
                        cookies: { necesarias: '1', analiticas: '1', funcionales: '1', publicidad: '1' }
                    });
                });
            });
            
            document.querySelectorAll('.rechazar-todas-cookies').forEach(btn => {
                btn.addEventListener('click', () => {
                    savePreferences({
                        consentimiento: 'rechazado',
                        cookies: { necesarias: '1', analiticas: '0', funcionales: '0', publicidad: '0' }
                    });
                });
            });
            
            document.getElementById('guardarConfiguracion')?.addEventListener('click', function() {
                const analiticas = document.querySelector('input[name="cookies[analiticas]"]').checked;
                const funcionales = document.querySelector('input[name="cookies[funcionales]"]').checked;
                const publicidad = document.querySelector('input[name="cookies[publicidad]"]').checked;
                
                savePreferences({
                    consentimiento: 'personalizado',
                    cookies: {
                        necesarias: '1',
                        analiticas: analiticas ? '1' : '0',
                        funcionales: funcionales ? '1' : '0',
                        publicidad: publicidad ? '1' : '0'
                    }
                });
            });
        });
        JS);
    }
}
