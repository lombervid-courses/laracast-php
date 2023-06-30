<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters';
}

if (count($errors)) {
    return view('registration/create', [
        'errors' => $errors,
    ]);
}

$db = App::resolve(Database::class);
$user = $db->query('SELECT * from users WHERE email = :email;', [
    'email' => $email,
])->find();

if ($user) {
    // redirect to login page
    header('location: /');
    exit();
}

$db->query('INSERT INTO users (email, password) VALUES (:email, :password);', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT),
]);

$_SESSION['user'] = [
    'email' => $email,
];

// redirect to dashboard
header('location: /');
exit();
