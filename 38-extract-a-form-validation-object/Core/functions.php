<?php

use Core\Response;

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


function login(array $user): void
{
    $_SESSION['user'] = $user;

    //security good practice
    session_regenerate_id(true);
}

function logout(): void
{
    //clear session and delete it's file
    $_SESSION = [];
    session_destroy();

    //expire the cookie
    $params = session_get_cookie_params();
    setcookie(
        'PHPSESSID',
        '',
        time() - 3600,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}