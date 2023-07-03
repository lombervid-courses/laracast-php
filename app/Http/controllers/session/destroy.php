<?php

declare(strict_types=1);

use Core\Authenticator;

(new Authenticator())->logout();

header('location: /');
exit();
