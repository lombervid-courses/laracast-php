<?php

$router->get('/', 'home');
$router->get('/about', 'about');
$router->get('/contact', 'contact');

$router->get('/notes', 'notes/index');
$router->get('/note', 'notes/show');
$router->get('/notes/create', 'notes/create');
