<?php

declare(strict_types=1);

use Core\Response;
use Core\Session;

function dump(mixed ...$values): void
{
    echo '<pre>';
    var_dump(...$values);
    echo '</pre>';
}

function dd(mixed ...$values): never
{
    dump(...$values);
    die();
}

function currentPage(): string
{
    return parse_url($_SERVER['REQUEST_URI'])['path'] ?? '';
}

function urlIs(string $url): bool
{
    return currentPage() === $url;
}

function abort(int $code = 404): never
{
    http_response_code($code);
    render("{$code}");
    die();
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
    return base_path("app/{$path}");
}

function config(string $path)
{
    return require base_path("config/{$path}.php");
}

function render(string $name, array $attributes = []): void
{
    $include = fn(string $name, array $attrs = []) => render($name, $attributes + $attrs);

    extract($attributes);

    require app_path("views/{$name}.php");
}

function view(string $name, array $attributes = []): void
{
    render("{$name}.view", $attributes);
}

function redirect(string $path): never
{
    header("location: {$path}");
    exit();
}

function old(string $key, mixed $default = ''): mixed
{
    return Session::getFlash('old')[$key] ?? $default;
}
