<?php

declare(strict_types=1);

use App\Components\Database;

$config = require base_path('/bootstrap/config.php');
$db = new Database($config['database'], 'db', 'db');

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id;', [
    'id' => $_GET['id'],
])->findOrFail();

if (!$note) {
    abort();
}

authorize($note->user_id === $currentUserId);

view('notes/show', ['heading' => 'Note', 'note' => $note]);
