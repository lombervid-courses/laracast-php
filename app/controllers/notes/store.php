<?php

declare(strict_types=1);

use App\Application;
use App\Database;
use App\Validator;

$db = Application::resolve(Database::class);
$errors = [];
$body = $_POST['body'];

if (! Validator::string($body, 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

if (count($errors)) {
    return view('notes/create', [
        'heading' => 'Create Note',
        'errors' => $errors,
    ]);
}

$db->query('INSERT INTO notes (user_id, body) VALUES(:user, :body);', [
    'user' => 1,
    'body' => $body,
]);

header('location: /notes');
die();
