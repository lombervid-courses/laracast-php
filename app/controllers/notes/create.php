<?php

declare(strict_types=1);

use App\Components\Database;
use App\Components\Validator;

require __SRC__ . '/Components/Validator.php';

$config = require __BOOTSTRAP__ . '/config.php';
$db = new Database($config['database'], 'db', 'db');

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'];

    if (! Validator::string($body, 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required';
    }

    if (count($errors) === 0) {
        $db->query('INSERT INTO notes (user_id, body) VALUES(:user, :body);', [
            'user' => 1,
            'body' => $body,
        ]);
    }
}

render('notes/create', ['heading' => 'Create Note', 'errors' => $errors]);
