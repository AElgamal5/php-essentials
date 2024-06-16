<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => './controllers/home.php',
    '/notes' => './controllers/notes.php',
    '/note' => './controllers/note.php',
    '/about' => './controllers/about.php',
    '/contact' => './controllers/contact.php',
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        return require $routes[$uri];
    }

    abort();
}

routeToController($uri, $routes);
