<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve(string|null $key): void
    {

        if (!$key) {
            return;
        }


        if (!array_key_exists($key, static::MAP)) {
            throw new \Exception("No matching middleware with this key '{$key}'");
        }

        (static::MAP[$key])::handle();

    }
}
