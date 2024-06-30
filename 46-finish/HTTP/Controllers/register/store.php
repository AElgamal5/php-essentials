<?php

use Core\App;
use Core\Database;
use HTTP\Forms\RegisterForm;

RegisterForm::validate($attributes = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

App::resolve(Database::class)->query(
    "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)",
    [
        'name' => $attributes['name'],
        'email' => $attributes['email'],
        'password' => password_hash($attributes['password'], PASSWORD_DEFAULT)
    ]
);

return redirect('/login');
