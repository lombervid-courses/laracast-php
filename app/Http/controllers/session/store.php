<?php

declare(strict_types=1);

use Core\Authenticator;
use Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if ((new Authenticator())->attempt($email, $password)) {
        return redirect('/');
    }

    $form->error('email', 'Not matching account for that email address and password');
}

return view('session/create', [
    'errors' => $form->errors(),
]);
