<?php

declare(strict_types=1);

use Core\Session;

view('session/create', [
    'errors' => Session::getFlash('errors', []),
]);
