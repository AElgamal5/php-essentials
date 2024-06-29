<?php

namespace Core;

class Container
{
    private $bindings = [];

    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(string $key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No binding matches with this key: {$key}");
        }

        return call_user_func($this->bindings[$key]);
    }
}
