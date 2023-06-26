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
    return parse_url($_SERVER['REQUEST_URI'])['path'] ?? '';
}

function urlIs(string $url): bool
{
    return currentPage() === $url;
}

function controller(string $name): void
{
    require __DIR__ . "/../app/controllers/{$name}.php";
}

function render(string $name, string $suffix = '.view'): void
{
    require __DIR__ . "/../app/views/{$name}{$suffix}.php";
}

function navbar()
{
    return require __DIR__ . '/navbar.php';
}

function heading(string $default = ''): string
{
    return navbar()[currentPage()]['heading'] ?? $default;
}
