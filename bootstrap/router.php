<?php

function routes(): array
{
    return [
        '/' => [
            'name' => 'Home',
            'heading' => 'Home',
            'controller' => 'home',
        ],
        '/about' => [
            'name' => 'About',
            'heading' => 'About Us',
            'controller' => 'about',
        ],
        '/contact' => [
            'name' => 'Contact',
            'heading' => 'Contact Us',
            'controller' => 'contact',
        ],
    ];
}

function routeToController(string $uri): void
{
    $routes = routes();

    if (array_key_exists($uri, $routes)) {
        controller($routes[$uri]['controller']);
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
