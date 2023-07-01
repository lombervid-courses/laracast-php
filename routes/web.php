<?php

$router->get('/', 'home');
$router->get('/about', 'about');
$router->get('/contact', 'contact');

$router->get('/notes', 'notes/index')->only('auth');
$router->get('/note', 'notes/show');
$router->delete('/note', 'notes/destroy');

$router->get('/note/edit', 'notes/edit');
$router->patch('/note', 'notes/update');

$router->get('/notes/create', 'notes/create');
$router->post('/notes', 'notes/store');

$router->get('/register', 'registration/create')->only('guest');
$router->post('/register', 'registration/store')->only('guest');

$router->get('/login', 'session/create')->only('guest');
$router->post('/session', 'session/store')->only('guest');
$router->delete('/session', 'session/destroy')->only('auth');
