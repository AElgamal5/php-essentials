<?php

use Core\Authenticator;
use HTTP\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

$signIn = (new Authenticator)->attempt(
    $attributes['email'],
    $attributes['password']
);

if (!$signIn) {
    $form->error('credentials', 'Wrong credentials.')
        ->throw();
}

redirect('/');
