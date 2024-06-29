<?php

use Core\App;
use Core\Database;
use Core\Response;
use HTTP\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
    http_response_code(Response::HTTP_UNPROCESSABLE_CONTENT);
    return view('session/create.view.php', ['heading' => 'User Login', 'errors' => $form->errors()]);
}

$user = $db->query("SELECT * from users where email = :email", ['email' => $email])->find();

if (!$user || !password_verify($password, $user['password'])) {

    $errors['credentials'][] = 'Wrong credentials';

    http_response_code(Response::HTTP_UNPROCESSABLE_CONTENT);
    return view('session/create.view.php', ['heading' => 'User Login', 'errors' => $errors]);
}

login([
    'id' => $user['id'],
    'name' => $user['name'],
    'email' => $user['email']
]);

header("Location: /");

exit;
