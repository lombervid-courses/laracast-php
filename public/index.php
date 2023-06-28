<?php

declare(strict_types=1);

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH  . '/app/helpers.php';

spl_autoload_register(function ($class) {
    $path = str_replace(['\\', 'App'], [DIRECTORY_SEPARATOR, 'src'], $class);

    require_once base_path("/{$path}.php");
});

require app_path('router.php');