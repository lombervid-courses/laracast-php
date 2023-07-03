<?php

declare(strict_types=1);

use Core\App;
use Core\Database;
use Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (! $form->validate($email, $password)) {
    return view('session/create', [
        'errors' => $form->errors(),
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
