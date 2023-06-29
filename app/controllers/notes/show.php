<?php

declare(strict_types=1);

use App\Database;

$config = config('app');
$db = new Database($config['database'], 'db', 'db');

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id;', [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note->user_id === $currentUserId);

view('notes/show', [
    'heading' => 'Note',
    'note' => $note,
]);
