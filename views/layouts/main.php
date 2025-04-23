<?php
/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
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
        'brandLabel' => '
            <div class="brand-container">
                <span class="brand-main">JuegoS de la mesa</span>
                <span class="brand-sub">Redonda</span>
            </div>
        ',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark fixed-top',
            'id' => 'main-header'
        ],
    ]);
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Personajes', 'url' => ['/personajes/index']],
            ['label' => 'Clases', 'url' => ['/clases/index']],
            ['label' => 'Juegos', 'url' => ['/juegos/index']],
            ['label' => 'Jugadores', 'url' => ['/jugadores/index']],
            ['label' => 'Modulos', 'url' => ['/modulos/index']],
            ['label' => 'Partidas', 'url' => ['/partidas/index']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'About', 'url' => ['/site/about']],
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li class="nav-item">'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout nav-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0" style="padding-top: 20px;">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container d-flex justify-content-between">
        <p>&copy; My Company <?= date('Y') ?></p>
        <p><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<style>
    /* Estilos generales del header */
    #main-header {
        background-color: #8B3A3A;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        padding: 5px 0;
    }
    
    /* Estilos para el logo/brand - más pequeño */
    .brand-container {
        display: flex;
        flex-direction: column;
        line-height: 1;
    }
    
    .brand-main {
        font-family: 'MedievalSharp', cursive;
        font-size: 1.4rem;
        color: white;
    }
    
    .brand-sub {
        font-family: 'MedievalSharp', cursive;
        font-size: 0.9rem;
        color: #C1A15A;
        text-align: center;
    }
    
    /* Estilos para los items del menú */
    .navbar-nav .nav-item {
        margin: 0 3px;
    }
    
    .navbar-nav .nav-link {
        color: rgba(255, 255, 255, 0.75);
        padding: 8px 12px;
        transition: all 0.3s ease;
    }
    
    .navbar-nav .nav-link:hover {
        color: white;
    }
    
    /* Estilos para el menú hamburguesa */
    .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.5);
    }
    
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 255, 255, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
    
    /* Estilos responsivos */
    @media (max-width: 991.98px) {
        .brand-main {
            font-size: 1.2rem;
        }
        
        .brand-sub {
            font-size: 0.8rem;
        }
        
        .navbar-nav {
            padding-top: 10px;
        }
        
        .navbar-nav .nav-item {
            margin: 5px 0;
        }
    }
    
    /* Ajuste del contenido principal para el header fijo */
    main {
        padding-top: 80px;
    }
    
    /* Estilos para el footer */
    .footer {
        background-color: #f8f9fa;
        border-top: 1px solid #ddd;
    }
</style>