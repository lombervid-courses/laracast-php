<?php

declare(strict_types=1);

namespace Core;

class Validator
{
    public static function string(string $value, int $min = 1, int|float $max = INF): bool
    {
        $value = trim($value);

        return $min <= strlen($value) && strlen($value) <= $max;
    }

    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}
