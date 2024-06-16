<?php

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
