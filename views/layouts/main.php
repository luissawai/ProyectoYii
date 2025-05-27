<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\widgets\Alert;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandLabel' => Html::img('@web/images/logo1.jpg', ['alt' => 'Logo', 'style' => 'height:100px;']),
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-lg navbar-dark fixed-top',
                'id' => 'main-header'
            ],
        ]);

        // Menú para usuarios logueados
        if (!Yii::$app->user->isGuest) {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav ml-auto align-items-center'],
                'items' => [
                    ['label' => 'Dashboard', 'url' => ['/site/dashboard']],
                    [
                        'label' => 'Gestión',
                        'items' => [
                            [
                                'label' => '<i class="fas fa-users"></i> Jugadores',
                                'url' => ['/jugadores/index'],
                                'encode' => false
                            ],
                            [
                                'label' => '<i class="fas fa-dice-d20"></i> Partidas',
                                'url' => ['/partidas/index'],
                                'encode' => false
                            ],
                            [
                                'label' => '<i class="fas fa-book"></i> Clases',
                                'url' => ['/clases/index'],
                                'encode' => false
                            ],
                            [
                                'label' => '<i class="fas fa-gamepad"></i> Juegos',
                                'url' => ['/juegos/index'],
                                'encode' => false
                            ],
                            [
                                'label' => '<i class="fas fa-scroll"></i> Módulos',
                                'url' => ['/modulos/index'],
                                'encode' => false
                            ],
                        ],
                        'encode' => false,
                    ],
                    [
                        'label' => '<span class="dropdown-icon-text"><i class="fas fa-user"></i>' .
                            Html::encode(Yii::$app->user->identity->username) . '</span>',
                        'items' => [
                            [
                                'label' => '<span class="dropdown-icon-text"><i class="fas fa-cog"></i>Perfil</span>',
                                'url' => ['/user/profile'],
                                'encode' => false
                            ],
                            [
                                'label' => '<span class="dropdown-icon-text"><i class="fas fa-bell"></i>Notificaciones</span>',
                                'url' => ['/user/notifications'],
                                'encode' => false
                            ],
                            '<div class="dropdown-divider"></div>',
                            [
                                'label' => '<span class="dropdown-icon-text"><i class="fas fa-sign-out-alt"></i>Cerrar Sesión</span>',
                                'url' => ['/site/logout'],
                                'encode' => false,
                                'linkOptions' => ['data-method' => 'post']
                            ],
                        ],
                        'encode' => false,
                    ],
                ],
            ]);
        } else {
            // Menú para usuarios no logueados
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav ml-auto align-items-center'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Sobre Nosotros', 'url' => ['/site/about']],
                    ['label' => 'Contacto', 'url' => ['/site/contacto']],
                    [
                        'label' => 'Login',
                        'url' => ['/site/login'],
                        'linkOptions' => ['class' => 'btn btn-purple btn-sm ml-3']
                    ],
                ],
            ]);
        }

        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container-main mt-5 pt-5">
            <?= Breadcrumbs::widget([
                'links' => $this->params['breadcrumbs'] ?? [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>

    </main>

    <footer class="footer mt-4 py-5">
        <div class="container px-4">
            <div class="row gy-4 gx-5">
                <div class="footer-bar col-lg-4 col-md-6">
                    <div class="footer-info">
                        <?= Html::img('@web/images/logo1.jpg', ['alt' => 'Logo', 'class' => 'footer-logo mb-3']) ?>
                        <p class="pb-3">
                            <span class="fw-bold">App Gestión de Juegos de rol de mesa</span><br>
                            Tu aventura comienza aquí<br>
                            <span class="copyright">&copy; <?= date('Y') ?> Todos los derechos reservados.</span>
                        </p>
                    </div>
                </div>

                <div class="footer-bar col-lg-4 col-md-6">
                    <h5 class="footer-heading mb-3">EXPLORA</h5>
                    <div class="footer-links d-flex flex-column">
                        <?= Html::a('<i class="fas fa-dice-d20 me-2"></i>Proyectos', ['/site/projects']) ?>
                        <?= Html::a('<i class="fas fa-scroll me-2"></i>Servicios', ['/site/services']) ?>
                        <?= Html::a('<i class="fas fa-users me-2"></i>Sobre Nosotros', ['/site/about']) ?>
                        <?= Html::a('<i class="fas fa-envelope me-2"></i>Contacto', ['/site/contacto']) ?>
                    </div>
                </div>

                <div class="footer-bar col-lg-4 col-md-6">
                    <h5 class="footer-heading mb-3">LEGAL</h5>
                    <div class="footer-links d-flex flex-column">
                        <?= Html::a('<i class="fas fa-shield-alt me-2"></i>Políticas de Seguridad', ['/site/privacy']) ?>
                        <?= Html::a('<i class="fas fa-gavel me-2"></i>Términos de Servicio', ['/site/terms']) ?>
                    </div>
                </div>
            </div>

            <hr class="footer-divider my-4">

            <div class="row">
                <div class="col-md-8">
                    <p class="small mb-0">
                        Explora un mundo de aventuras y fantasía con nuestra comunidad de jugadores.
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="social-links text-center text-md-end pt-3 pt-md-0">
                        <a href="mailto:contacto@tusitio.com" class="email"><i class="fas fa-envelope"></i></a>
                        <a href="https://reddit.com" class="reddit"><i class="fab fa-reddit"></i></a>
                        <a href="https://linkedin.com" class="linkedin"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com" class="github"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <?= \app\widgets\CookieConsent::widget() ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

<style>
    /* Variables globales */
    :root {
        --primary-color: #080f19;
        --secondary-color: #f1c40f;
        --purple-color: #5a189a;
        --dark-purple: #3c096c;
        --footer-bg: rgb(31, 21, 34);
    }

    /* Common container styles */
    .navbar>.container,
    .container-main,
    .footer>.container {
        max-width: 1650px;
        width: 100%;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Header styles */
    #main-header {
        background-color: var(--footer-bg);
        padding: 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    .navbar {
        margin: 0 auto;
        padding: 0.5rem 0;
    }

    .navbar-brand {
        padding: 0.5rem 0;
    }

    .navbar-brand img {
        height: 80px;
        transition: transform 0.3s ease;
    }

    .navbar-nav .nav-link {
        color: white;
        font-size: 16px;
        margin: 0 15px;
        text-transform: uppercase;
        padding: 0.5rem 1rem;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-item i {
        margin-right: 8px;
        width: 20px;
        text-align: center;
    }

    /* Footer styles */
    .footer {
        background-color: var(--footer-bg);
        color: white;
        font-size: 14px;
        padding: 4rem 0 2rem;
        width: 100%;
    }

    .footer-bar {
        padding: 0 1.5rem;
    }

    .footer-info {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .footer-logo {
        height: 60px;
        width: 60px;
    }

    .footer-heading {
        font-size: 1.2rem;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.75rem;
    }

    .footer-heading::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 2px;
        background-color: var(--purple-color);
    }

    .footer-links {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .footer-links a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }

    .footer-links a i {
        width: 24px;
        margin-right: 12px;
        text-align: center;
    }

    .footer-links a:hover {
        color: white;
        transform: translateX(5px);
    }

    .social-links {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 1rem;
    }

    .social-links a {
        width: 36px;
        height: 36px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.3s ease;
    }

    .social-links a:hover {
        background-color: var(--purple-color);
        transform: translateY(-3px);
    }

    .footer-divider {
        margin: 3rem 0 2rem;
        border-color: rgba(255, 255, 255, 0.1);
    }

    @media (max-width: 768px) {
        #main-header {
            padding: 0.5rem 1rem;
        }

        .navbar>.container,
        .container-main,
        .footer>.container {
            padding: 0 1rem;
        }

        .footer-bar {
            padding: 0 1rem;
            text-align: center;
        }

        .footer-heading::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .footer-links a {
            justify-content: center;
        }

        .social-links {
            justify-content: center;
        }
    }
</style> 