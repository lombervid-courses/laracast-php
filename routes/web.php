<?php

$router->get('/', 'home');
$router->get('/about', 'about');
$router->get('/contact', 'contact');

$router->get('/notes', 'notes/index');
$router->get('/note', 'notes/show');
$router->delete('/note', 'notes/destroy');

$router->get('/note/edit', 'notes/edit');
$router->patch('/note', 'notes/update');

$router->get('/notes/create', 'notes/create');
$router->post('/notes', 'notes/store');
