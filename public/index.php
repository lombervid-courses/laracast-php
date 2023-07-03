<?php

declare(strict_types=1);

use Core\Router;
use Core\Session;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH  . '/app/helpers.php';

session_start();

spl_autoload_register(function ($class) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require_once base_path("src/{$path}.php");
});

require base_path('bootstrap/app.php');

$router = new Router();
require base_path('routes/web.php');

$uri = currentPage();
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();
