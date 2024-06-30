<?php

namespace Core;

class Validator
{
    public static function required($value): bool
    {
        return strlen(trim($value)) != 0;
    }

    public static function max($value, $max = INF): bool
    {
        return strlen(trim($value)) >= $max;
    }

    public static function min($value, $min = 1): bool
    {
        return strlen(trim($value)) <= $min;
    }

    public static function string($value, $min = 1, $max = INF): bool
    {
        $length = strlen(trim($value));

        return $length >= $min && $length <= $max;
    }

    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function unique(string $value, string $table, string $column): bool
    {
        return empty(App::resolve(Database::class)
            ->query("SELECT * FROM {$table} WHERE {$column} = :value", ['value' => $value])->find());
    }

    public static function gt(int $value, int $greaterThanValue): bool
    {
        return $value > $greaterThanValue;
    }
}
