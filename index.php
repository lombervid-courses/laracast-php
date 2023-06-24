<?php

use App\Components\Database;

require __DIR__ . '/bootstrap/helpers.php';
// require __DIR__ . '/bootstrap/router.php';

require __DIR__ . '/src/Components/Database.php';


$config = require __DIR__ . '/bootstrap/config.php';

$db = new Database($config['database'], 'db', 'db');

$id = $_GET['id'];
$posts = $db->query('SELECT * FROM posts where id = :id;', ['id' => $id])->fetch();

dd($posts);
