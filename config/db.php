<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=db;dbname=juegosrol',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
]; 
// Nota: cuando se use en docker cambiar a host=db y cuando no host=localhost
//browser-sync start --proxy localhost:8080 --files "views/**/*.php, assets/**/*.*, web/css/*.css, web/js/*.js" comando para recarga