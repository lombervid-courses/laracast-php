<?php

function routes(): array
{
    return [
        '/' => 'home',
        '/about' => 'about',
        '/contact' => 'contact',
    ];
}

function routeToController(string $uri): void
{
    $routes = routes();

    if (array_key_exists($uri, $routes)) {
        controller($routes[$uri]);
    } else {
        abort();
    }
}

function abort(int $code = 404): void
{
    http_response_code($code);
    render($code, '');
    die();
}

$uri = currentPage();
routeToController($uri);
