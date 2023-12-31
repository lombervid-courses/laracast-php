<?php

declare(strict_types=1);

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id;', [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note->user_id === $currentUserId);

$errors = [];
$body = $_POST['body'];

if (! Validator::string($body, 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

if (count($errors)) {
    return view('notes/edit', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id;', [
    'id' => $note->id,
    'body' => $body,
]);

header('location: /notes');
die();
