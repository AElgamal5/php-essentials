<?php

namespace Core;

class Session
{
    public static function put(int|string|bool $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(int|string|bool $key, mixed $default = null): mixed
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function has($key): bool
    {
        return (bool) static::get($key);
    }

    public static function flash(int|string|bool $key, mixed $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash(): void
    {
        unset($_SESSION['_flash']);
    }

    public static function flush(): void
    {
        $_SESSION = [];
    }

    public static function destroy(): void
    {
        //clear session and delete it's file
        static::flush();
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
}
