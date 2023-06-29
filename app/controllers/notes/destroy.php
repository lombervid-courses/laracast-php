<?php

declare(strict_types=1);

use App\Application;
use App\Database;

$db = Application::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id;', [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note->user_id === $currentUserId);

$db->query('DELETE FROM notes WHERE id = :id;', [
    'id' => $note->id,
]);

header('location: /notes');
exit();
