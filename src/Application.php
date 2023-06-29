<?php

declare(strict_types=1);

namespace App;

class Application
{
    protected static Container $container;

    public static function setContainer(Container $container): void
    {
        static::$container = $container;
    }

    public static function container(): Container
    {
        return static::$container;
    }

    public static function bind(string $key, callable $resolver): void
    {
        static::container()->bind($key, $resolver);
    }

    public static function resolve(string $key): mixed
    {
        return static::container()->resolve($key);
    }
}
