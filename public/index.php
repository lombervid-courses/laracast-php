<?php

declare(strict_types=1);

define('__ROOT__', __DIR__);
define('__BOOTSTRAP__', __ROOT__ . '/bootstrap');
define('__SRC__', __ROOT__ . '/src');
define('__APP__', __ROOT__ . '/app');
define('__CONTROLLERS__', __APP__ . '/controllers');
define('__VIEWS__', __APP__ . '/views');

require __BOOTSTRAP__ . '/helpers.php';
require __SRC__ . '/Components/Database.php';
require __SRC__ . '/Components/Response.php';
require __BOOTSTRAP__ . '/router.php';
