<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\web\Cookie;
use Yii;

class CookieConsent extends Widget
{
    public function run()
    {
        if (!Yii::$app->request->cookies->has('consentimiento_cookies')) {
            $view = $this->getView();
            $this->registerAssets();
            return $this->render('cookie-consent');
        }
        return '';
    }

    protected function registerAssets()
    {
        $view = $this->getView();

        $css = <<<CSS
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9998;
            display: none;
        }

        .cookie-modal-consent {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    width: 90%;
    max-width: 500px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 9999;
}
        .cookie-modal-settings {
            position: fixed;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            width: 90%;
            max-width: 500px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }

        .cookie-modal-consent {
            bottom: 20px;
            top: auto;
            transform: translateX(-50%);
        }

        .cookie-modal-settings {
            top: 50%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
        }

        .cookie-modal-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #eee;
        }

        .cookie-modal-header h5 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .cookie-modal-body {
            padding: 1.5rem;
            line-height: 1.5;
        }

        .cookie-modal-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
        }

        .btn-cookie {
            padding: 0.5rem 1.25rem;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn-accept {
            background: #07608e;
            color: white;
        }

        .btn-reject {
            background: #f0f0f0;
            color: #333;
        }

        .cookie-sections {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .cookie-section {
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 6px;
        }

        .cookie-section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
CSS;

        $js = <<<JS
        document.addEventListener('DOMContentLoaded', function() {
            const modalInicial = document.getElementById('cookieConsentModal');
            const modalConfiguracion = document.getElementById('cookieSettingsModal');
            const overlay = document.getElementById('modalOverlay');
            
            function showModal(modal) {
                overlay.style.display = 'block';
                modal.style.display = 'block';
            }
            
            function hideModal(modal) {
                overlay.style.display = 'none';
                modal.style.display = 'none';
            }
            
            // Mostrar modal inicial
            showModal(modalInicial);
            
            // Configurar botones
            document.getElementById('abrirConfiguracionCookies').addEventListener('click', function(e) {
                e.preventDefault();
                hideModal(modalInicial);
                showModal(modalConfiguracion);
            });
            
            // Aceptar todas las cookies
            document.querySelectorAll('.aceptar-todas-cookies').forEach(btn => {
                btn.addEventListener('click', function() {
                    fetch('/site/consentimiento-cookies', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            consentimiento: 'aceptado',
                            cookies: {
                                necesarias: true,
                                analiticas: true,
                                funcionales: true,
                                publicidad: true
                            }
                        })
                    }).then(() => {
                        hideModal(modalInicial);
                        hideModal(modalConfiguracion);
                    });
                });
            });
            
            // Rechazar todas las cookies
            document.querySelectorAll('.rechazar-todas-cookies').forEach(btn => {
                btn.addEventListener('click', function() {
                    fetch('/site/consentimiento-cookies', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            consentimiento: 'rechazado',
                            cookies: {
                                necesarias: true,
                                analiticas: false,
                                funcionales: false,
                                publicidad: false
                            }
                        })
                    }).then(() => {
                        hideModal(modalInicial);
                        hideModal(modalConfiguracion);
                    });
                });
            });
            
            // Guardar configuración personalizada
            document.getElementById('guardarConfiguracion').addEventListener('click', function() {
                const analiticas = document.querySelector('input[name="cookies_analisis"]').checked;
                const funcionales = document.querySelector('input[name="cookies_funcionales"]').checked;
                const publicidad = document.querySelector('input[name="cookies_publicidad"]').checked;
                
                fetch('/site/consentimiento-cookies', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        consentimiento: 'personalizado',
                        cookies: {
                            necesarias: true,
                            analiticas: analiticas,
                            funcionales: funcionales,
                            publicidad: publicidad
                        }
                    })
                }).then(() => {
                    hideModal(modalConfiguracion);
                });
            });
        });
JS;

        $view->registerCss($css);
        $view->registerJs($js);
    }
}
