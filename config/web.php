<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Proyecto-TFG',
    'language' => 'es',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'A7iZvO4aXqcmTDL6sYBIoTygsMq4u7q5',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true, // Cambia a false si quieres enviar emails reales
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        // ✅ CORRECCIÓN: mover `rules` dentro de `urlManager`
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false, // ✅ Si quieres URLs sin index.php
            'rules' => [
                'register' => 'site/register', // ✅ Ahora está en el lugar correcto
                'login' => 'site/login',
                'logout' => 'site/logout',
                'calendario/eventos' => 'calendario/eventos',
                'calendario/guardar-evento' => 'calendario/guardar-evento'
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // Configuración para entorno de desarrollo
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
