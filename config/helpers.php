<?php

if (!function_exists('dump')) {
    function dump(mixed $var): void
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}

if (!function_exists('dd')) {
    function dd(mixed $var): never
    {
        dump($var);
        die();
    }
}

function currentPage(): string
{
    return $_SERVER['REQUEST_URI'];
}

function urlIs(string $url): bool
{
    return currentPage() === $url;
}
