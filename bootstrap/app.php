<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind(Database::class, function () {
    $config = config('app');

    return new Database($config['database'], 'db', 'db');
});

App::setContainer($container);
