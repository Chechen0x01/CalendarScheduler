<?php

$libs = require_once 'config/libraries.php';
foreach ($libs as $lib) {
    require_once 'libs/' . $lib . '.php';
}

/*$db = require_once 'config/database.php';
\R::setup( 'mysql:host=' . $db['host'] . ';port=' . $db['port'] . ';dbname=' . $db['base'], $db['user'], $db['pass'] );
if(!\R::testConnection()) {
    echo 'Error database connect';
    die();
}*/

/*$routes = require_once 'config/routes.php';
foreach ($routes as $uri => $page) {
    app\services\Router::page($uri, $page);
}
app\services\Router::enable();*/
