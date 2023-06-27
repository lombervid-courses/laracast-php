<?php

use App\Components\Database;

$config = require __DIR__ . '/../../bootstrap/config.php';
$db = new Database($config['database'], 'db', 'db');

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'];

    if (strlen($body) === 0) {
        $errors['body'] = 'A body is required';
    }

    if (strlen($body) > 1000) {
        $errors['body'] = 'The body can not be more than 1,000 characters';
    }

    if (count($errors) === 0) {
        $db->query('INSERT INTO notes (user_id, body) VALUES(:user, :body);', [
            'user' => 1,
            'body' => $body,
        ]);
    }
}

render('note-create', ['heading' => 'Create Note', 'errors' => $errors]);
