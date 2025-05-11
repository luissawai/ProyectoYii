<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

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
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandLabel' => Html::img('@web/images/logo1.jpg', ['alt' => 'Logo', 'style' => 'height:80px;']),
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-lg navbar-dark fixed-top',
                'id' => 'main-header'
            ],
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto align-items-center'],
            'items' => [
                ['label' => 'Jugadores', 'url' => ['/jugadores/index'], 'linkOptions' => ['class' => 'nav-link']],
                ['label' => 'Partidas', 'url' => ['/partidas/index'], 'linkOptions' => ['class' => 'nav-link']],
                ['label' => 'Sobre Nosotros', 'url' => ['/site/about'], 'linkOptions' => ['class' => 'nav-link']],
                ['label' => 'Contacto', 'url' => ['/site/contacto'], 'linkOptions' => ['class' => 'nav-link']],
                Yii::$app->user->isGuest ? (
                    [
                        'label' => 'Login',
                        'url' => ['/site/login'],
                        'linkOptions' => ['class' => 'btn btn-purple btn-sm ml-3']
                    ]
                ) : (
                    '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-outline-light btn-sm ml-3']
                    )
                    . Html::endForm()
                    . '</li>'
                ),
            ],
        ]);

        // ----------------------------------------
        // 🚀 Inicio de la barra de búsqueda
        echo Html::beginForm(['/site/search'], 'get', ['class' => 'form-inline ml-auto']);
        echo Html::input('text', 'q', Yii::$app->request->get('q'), [
            'class' => 'form-control mr-sm-2',
            'placeholder' => 'Buscar...',
            'aria-label' => 'Buscar'
        ]);
        echo Html::submitButton('Buscar', ['class' => 'btn btn-purple my-2 my-sm-0']);
        echo Html::endForm();
        // 🚀 Fin de la barra de búsqueda
        // -----

        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container-main mt-5 pt-5">
            <?= Breadcrumbs::widget([
                'links' => $this->params['breadcrumbs'] ?? [],
            ]) ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-4 py-4 navbar-expand-lg text-white h-100">
        <div class="container">
            <div class="row">
                <!-- Logo y derechos reservados -->
                <div class="col-md-4 text-center mb-3">
                    <?= Html::img('@web/images/logo1.jpg', ['alt' => 'Logo', 'style' => 'height:50px;']) ?>
                    <p class="mt-3">&copy; <?= date('Y') ?> Juego de la Mesa Redonda. Todos los derechos reservados.</p>
                </div>

                <!-- Enlaces del header -->
                <div class="col-md-4 text-center mb-3">
                    <h5>SECCIONES</h5>
                    <ul class="list-unstyled">
                        <li><?= Html::a('Proyectos', ['/site/projects'], ['class' => 'text-white']) ?></li>
                        <li><?= Html::a('Servicios', ['/site/services'], ['class' => 'text-white']) ?></li>
                        <li><?= Html::a('Sobre Nosotros', ['/site/about'], ['class' => 'text-white']) ?></li>
                        <li><?= Html::a('Contacto', ['/site/contacto'], ['class' => 'text-white']) ?></li>
                    </ul>
                </div>

                <!-- Enlaces legales -->
                <div class="col-md-4 text-center mb-3">
                    <h5>LEGAL</h5>
                    <ul class="list-unstyled">
                        <li><?= Html::a('Políticas de Seguridad', ['/site/privacy'], ['class' => 'text-white']) ?></li>
                        <li><?= Html::a('Términos de Servicio', ['/site/terms'], ['class' => 'text-white']) ?></li>
                    </ul>
                </div>
            </div>

            <!-- Iconos sociales -->
            <div class="text-center mt-4">
                <a href="mailto:contacto@tusitio.com" class="text-white mx-2"><i class="fas fa-envelope"></i></a>
                <a href="https://reddit.com" class="text-white mx-2"><i class="fab fa-reddit"></i></a>
                <a href="https://linkedin.com" class="text-white mx-2"><i class="fab fa-linkedin"></i></a>
                <a href="https://github.com" class="text-white mx-2"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

<style>
    /* Paleta de colores */
    html,
    body {
        margin: 0;
        padding: 0;
        height: 100%;
        /* Asegura que ocupen toda la altura de la ventana */
        display: flex;
        flex-direction: column;
        /* Configura el diseño en columnas */
    }

    .container-main {
        padding: 0;
        margin: 0;
    }

    main {
        flex: 1;
        /* Hace que el contenido principal ocupe el espacio restante */
    }

    .footer {
        background-color: #080f19;
        /* Fondo oscuro */
        color: white;
        font-size: 14px;
        margin-bottom: 0;
        /* Elimina cualquier margen adicional */
        padding: 20px 0;
    }

    :root {
        --primary-color: #080f19;
        /* Morado oscuro */
        --secondary-color: #080f19;
        /* Dorado */
        --background-color: #f5f0e1;
        /* Beige */
        --pink-color: #ff007a;
        /* Rosa brillante */
    }

    /* Header */
    #main-header {
        background-color: rgb(31, 21, 34);
        /* Fondo oscuro */
        padding: 10px 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar-nav .nav-link {
        color: white;
        font-size: 16px;
        margin-right: 15px;
        text-transform: uppercase;
    }

    .navbar-nav .nav-link:hover {
        color: var(--secondary-color);
        text-decoration: underline;
    }

    .btn-purple {
        background-color: #5a189a;
        /* Morado oscuro */
        color: white;
        font-weight: bold;
        border-radius: 5px;
        /* Bordes redondeados */
        padding: 8px 16px;
        /* Tamaño del botón */
        border: none;
        text-transform: uppercase;
        font-size: 14px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-purple:hover {
        background-color: #3c096c;
        /* Morado más oscuro al pasar el mouse */
        color: white;
        text-decoration: none;
        transform: scale(1.05);
        /* Efecto de agrandamiento */
    }

    /* Logo */
    .navbar-brand img {
        height: 80px;
    }

    /* Espaciado */
    .navbar-nav {
        align-items: center;
    }

    .footer {
        background-color: rgb(31, 21, 34);
        /* Fondo oscuro */
        color: white;
        font-size: 14px;
    }

    .footer h5 {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .footer ul {
        padding: 0;
        list-style: none;
    }

    .footer ul li {
        margin-bottom: 10px;
    }

    .footer ul li a {
        color: white;
        text-decoration: none;
    }

    .footer ul li a:hover {
        color: var(--secondary-color);
        /* Dorado */
        text-decoration: underline;
    }

    .footer .text-center a {
        font-size: 16px;
        color: white;
        margin: 0 10px;
        text-decoration: none;
    }

    .footer .text-center a:hover {
        color: var(--secondary-color);
        /* Dorado */
    }
</style>