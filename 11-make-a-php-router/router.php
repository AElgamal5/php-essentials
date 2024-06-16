<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/home.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        return require $routes[$uri];
    }

    abort();
}

function abort(int $statusCode = 404): void
{
    http_response_code($statusCode);

    require "views/{$statusCode}.view.php";

    die();
}

routeToController($uri, $routes);
