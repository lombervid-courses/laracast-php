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
    require app_path("controllers/{$name}.php");
}

function authorize(bool $condition, int $status = Response::FORBIDDEN): void
{
    if (! $condition) {
        abort($status);
    }
}

function base_path(string $path)
{
    return BASE_PATH . $path;
}

function app_path(string $path)
{
    return base_path('app/' . $path);
}

function config(string $path)
{
    return require base_path("config/{$path}.php");
}

function render(string $name, array $attributes = []): void
{
    global $viewAttributes;

    extract($viewAttributes = ($viewAttributes ?? []) + $attributes);

    require app_path("views/{$name}.php");
}

function view(string $name, array $attributes = []): void
{
    render($name . '.view', $attributes);
}
