<?php

declare(strict_types=1);

use App\Database;

$config = config('app');
$db = new Database($config['database'], 'db', 'db');

$notes = $db->query('SELECT * FROM notes WHERE user_id = :id;', ['id' => 1])->get();

view('notes/index', ['heading' => 'My Notes', 'notes' => $notes]);
