<?php

declare(strict_types=1);

use App\Application;
use App\Database;

$db = Application::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id;', [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note->user_id === $currentUserId);

view('notes/show', [
    'heading' => 'Note',
    'note' => $note,
]);
