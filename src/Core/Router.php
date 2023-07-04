<?php

declare(strict_types=1);

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected array $routes = [];

    public function add(string $method, string $uri, string $controller): static
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null,
        ];

        return $this;
    }

    public function get(string $uri, string $controller): static
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller): static
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete(string $uri, string $controller): static
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch(string $uri, string $controller): static
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put(string $uri, string $controller): static
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only(string $key): static
    {
        $index = array_key_last($this->routes);

        if (is_null($index)) {
            throw new \Exception('No route declared');
        }

        $this->routes[$index]['middleware'] = $key;

        return $this;
    }

    public function route(string $uri, string $method): void
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);

                require app_path("Http/controllers/{$route['controller']}.php");
                return;
            }
        }

        $this->abort();
    }

    public function previousUrl(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }

    protected function abort(int $code = 404): never
    {
        http_response_code($code);
        render("{$code}");
        die();
    }
}
