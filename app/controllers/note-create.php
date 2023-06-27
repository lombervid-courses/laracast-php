<?php

use App\Components\Database;

$config = require __DIR__ . '/../../bootstrap/config.php';
$db = new Database($config['database'], 'db', 'db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query('INSERT INTO notes (user_id, body) VALUES(:user, :body);', [
        'user' => 1,
        'body' => $_POST['body'],
    ]);
}

render('note-create', ['heading' => 'Create Note']);
