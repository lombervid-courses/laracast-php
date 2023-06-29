<?php

declare(strict_types=1);

use App\Application;
use App\Database;

$db = Application::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes WHERE user_id = :id;', ['id' => 1])->get();

view('notes/index', ['heading' => 'My Notes', 'notes' => $notes]);
