<?php

use Core\Response;
use Core\Session;

function dd(mixed $value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function isUrl(string $value): bool
{
    return $_SERVER['REQUEST_URI'] == $value;
}

function abort(int $statusCode = Response::HTTP_NOT_FOUND): void
{
    http_response_code($statusCode);

    require BASE_PATH . 'views/' . $statusCode . '.view.php';

    die();
}

function isAuthorize(bool $condition, $state = Response::HTTP_FORBIDDEN): void
{
    if (!$condition) {
        abort($state);
    }
}


function basePath($path)
{
    return BASE_PATH . $path;
}

function view(string $path, array $attributes = [])
{
    extract($attributes);

    require basePath('views/' . $path);
}


function redirect(string $path): void
{
    header("Location: {$path}");
    exit;
}


function old(int|string|bool $key, mixed $default = ''): mixed
{
    return Session::get('old')[$key] ?? $default;
}