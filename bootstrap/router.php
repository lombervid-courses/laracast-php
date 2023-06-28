<?php

declare(strict_types=1);

$routes = require __DIR__ . '/routes.php';

function routeToController(string $uri, array $routes): void
{
    if (array_key_exists($uri, $routes)) {
        controller($routes[$uri]);
    } else {
        abort();
    }
}

function abort(int $code = 404): never
{
    http_response_code($code);
    render("{$code}", suffix: '');
    die();
}

routeToController(currentPage(), $routes);
