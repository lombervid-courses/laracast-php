<?php

use App\Components\Database;
use App\Components\Response;

$config = require __DIR__ . '/../../bootstrap/config.php';
$db = new Database($config['database'], 'db', 'db');

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id;', [
    'id' => $_GET['id'],
])->fetch();

if (!$note) {
    abort();
}

if ($note->user_id !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

render('note', ['heading' => 'Note', 'note' => $note]);
