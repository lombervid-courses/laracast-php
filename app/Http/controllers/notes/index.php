<?php

declare(strict_types=1);

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes WHERE user_id = :id;', ['id' => 1])->get();

view('notes/index', ['heading' => 'My Notes', 'notes' => $notes]);
