<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection([
    1, 2, 3, 4, 5, 6, 7, 8, 9, 10,
]);

if ($numbers->contains(100)) {
    die('it contains 10');
}

$lessThanOrEqualTo5 = $numbers->filter(fn($n) => $n <= 5);

var_dump($lessThanOrEqualTo5);
