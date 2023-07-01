<?php

declare(strict_types=1);

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password';
}

if (count($errors)) {
    return view('session/create', [
        'errors' => $errors,
    ]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email;', [
    'email' => $email,
])->find();

if ($user) {
    if (password_verify($password, $user->password)) {
        login($user);

        header('location: /');
        exit();
    }
}

return view('session/create', [
    'errors' => [
        'email' => 'Not matching account for that email address and password'
    ],
]);
