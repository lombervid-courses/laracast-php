<?php

declare(strict_types=1);

namespace App;

class Container
{
    protected $bindings = [];

    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(string $key): mixed
    {
        if (! array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding for \"{$key}\"");
        }

        return $this->bindings[$key]();
    }
}
