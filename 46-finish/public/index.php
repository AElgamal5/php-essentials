<?php

use Core\Router;
use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . '/vendor/autoload.php';

session_start();

require BASE_PATH . 'Core/functions.php';

require basePath('/bootstrap.php');

$router = new Router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $ex) {
    Session::flash('errors', $ex->errors);
    Session::flash('old', $ex->old);

    return redirect($router->perviousUrl());
}

Session::unflash();
