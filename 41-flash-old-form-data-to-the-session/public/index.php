<?php

use Core\Router;
use Core\Session;

const BASE_PATH = __DIR__ . '/../';

session_start();

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    require basePath(str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php');
});

require basePath('/bootstrap.php');

$router = new Router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();