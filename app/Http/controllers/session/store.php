<?php

declare(strict_types=1);

use Core\Authenticator;
use Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

$signedIn = (new Authenticator())->attempt(
    $attributes['email'],
    $attributes['password'],
);

if (! $signedIn) {
    $form->error(
        'email',
        'Not matching account for that email address and password',
    )->throw();
}

return redirect('/');
