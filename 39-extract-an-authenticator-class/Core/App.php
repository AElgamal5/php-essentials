<?php

namespace Core;

class App
{
    private static $container;

    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }

    public static function container(): Container
    {
        return static::$container;
    }

    public static function bind(string $key, callable $resolver)
    {
        return static::$container->bind($key, $resolver);
    }

    public static function resolve(string $key)
    {
        return static::$container->resolve($key);
    }
}
