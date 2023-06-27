<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    dd($_POST);
}

render('note-create', ['heading' => 'Create Note']);
