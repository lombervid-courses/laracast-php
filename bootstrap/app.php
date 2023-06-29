<?php

use App\Application;
use App\Container;
use App\Database;

$container = new Container();

$container->bind(Database::class, function () {
    $config = config('app');

    return new Database($config['database'], 'db', 'db');
});

Application::setContainer($container);
