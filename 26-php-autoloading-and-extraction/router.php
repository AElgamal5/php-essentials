<?php

$routes = require basePath('routes.php');

function routeToController(string $uri, array $routes)
{
    if (array_key_exists($uri, $routes)) {
        return require basePath($routes[$uri]);
    }

    abort();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);
