<?php

use App\Components\Database;

$config = require __DIR__ . '/../../bootstrap/config.php';
$db = new Database($config['database'], 'db', 'db');

$notes = $db->query('SELECT * FROM notes WHERE user_id = :id;', ['id' => 1])->fetchAll();

render('notes', ['heading' => 'My Notes', 'notes' => $notes]);
