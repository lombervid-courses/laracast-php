<?php

use App\Components\Database;

require __DIR__ . '/bootstrap/helpers.php';
// require __DIR__ . '/bootstrap/router.php';

require __DIR__ . '/src/Components/Database.php';

$db = new Database();
$posts = $db->query('SELECT * FROM posts;')->fetchAll(PDO::FETCH_OBJ);

dd($posts);
