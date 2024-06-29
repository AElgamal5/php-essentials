<?php

use Core\Authenticator;
use Core\Response;
use HTTP\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('credentials', 'Wrong credentials');
}

http_response_code(Response::HTTP_UNPROCESSABLE_CONTENT);
return view('session/create.view.php', ['heading' => 'User Login', 'errors' => $form->errors()]);

