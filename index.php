<?php

//autoloader
spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
    if (file_exists($file)) {
        require $file;
    }
});

//include libraries
$libs = require_once 'config/libraries.php';
foreach ($libs as $lib) {
    require_once 'libs/' . $lib;
}

//connect database
$db = require_once 'config/database.php';
$connection = new PDO('mysql:host=' . $db['host'] . ';port=' . $db['port'] . ';dbname=' . $db['base'], $db['user'], $db['pass']);
//TODO check connect
ActiveRecord::setDb($connection);

//init routes
$routes = require_once 'config/routes.php';
foreach ($routes as $uri => $page) {
    app\services\Router::page($uri, $page);
}
app\services\Router::enable();
