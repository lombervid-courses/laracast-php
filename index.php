<?php

use App\Components\Database;

require __DIR__ . '/config/helpers.php';
// require __DIR__ . '/config/router.php';

require __DIR__ . '/src/Components/Database.php';

$db = new Database();
$posts = $db->query('SELECT * FROM posts;')->fetchAll(PDO::FETCH_OBJ);

dd($posts);
