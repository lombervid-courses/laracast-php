<?php

declare(strict_types=1);

use App\Router;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH  . '/app/helpers.php';

spl_autoload_register(function ($class) {
    $path = str_replace(['\\', 'App'], [DIRECTORY_SEPARATOR, 'src'], $class);

    require_once base_path("/{$path}.php");
});

$router = new Router();
require base_path('routes/web.php');

$uri = currentPage();
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
