<?php

declare(strict_types=1);

use App\Components\Database;

$config = config('app');
$db = new Database($config['database'], 'db', 'db');

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id;', [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note->user_id === $currentUserId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query('DELETE FROM notes WHERE id = :id;', [
        'id' => $note->id,
    ]);

    header('location: /notes');
    exit();
}

view('notes/show', ['heading' => 'Note', 'note' => $note]);
