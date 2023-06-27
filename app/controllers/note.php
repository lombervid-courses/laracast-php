<?php

use App\Components\Database;

$config = require __DIR__ . '/../../bootstrap/config.php';
$db = new Database($config['database'], 'db', 'db');

$note = $db->query('SELECT * FROM notes WHERE id = :id;', ['id' => $_GET['id']])->fetch();

render('note', ['heading' => 'Note', 'note' => $note]);
