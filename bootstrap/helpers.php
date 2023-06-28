<?php

declare(strict_types=1);

use App\Components\Response;

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
    require __CONTROLLERS__ . "/{$name}.php";
}

function render(string $name, array $data = [], string $suffix = '.view'): void
{
    extract($data);

    require __VIEWS__ . "/{$name}{$suffix}.php";
}

function authorize(bool $condition, int $status = Response::FORBIDDEN): void
{
    if (! $condition) {
        abort($status);
    }
}
