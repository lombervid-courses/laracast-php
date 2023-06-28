<?php

declare(strict_types=1);

use App\Components\Database;

$config = require __BOOTSTRAP__ . '/config.php';
$db = new Database($config['database'], 'db', 'db');

$notes = $db->query('SELECT * FROM notes WHERE user_id = :id;', ['id' => 1])->get();

render('notes/index', ['heading' => 'My Notes', 'notes' => $notes]);
