<?php

declare(strict_types=1);

namespace App;

class Router
{
    protected array $routes = [];

    public function add(string $method, string $uri, string $controller): void
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
        ];
    }

    public function get(string $uri, string $controller): void
    {
        $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller): void
    {
        $this->add('POST', $uri, $controller);
    }

    public function delete(string $uri, string $controller): void
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function patch(string $uri, string $controller): void
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put(string $uri, string $controller): void
    {
        $this->add('PUT', $uri, $controller);
    }

    public function route(string $uri, string $method): void
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                require app_path("controllers/{$route['controller']}.php");
                return;
            }
        }

        $this->abort();
    }

    protected function abort(int $code = 404): never
    {
        http_response_code($code);
        render("{$code}");
        die();
    }
}
