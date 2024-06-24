<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Validator;


$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::required($email)) {
    $errors['email'][] = "email is required.";
}
if (!Validator::email($email)) {
    $errors['email'][] = "Not a valid email.";
}

if (!Validator::required($password)) {
    $errors['password'][] = "password is required.";
}
if (!Validator::string($password, 6, 255)) {
    $errors['password'][] = "password of length should be between 6 and 255 character.";
}

if (!empty($errors)) {

    http_response_code(Response::HTTP_UNPROCESSABLE_CONTENT);
    return view('session/create.view.php', ['heading' => 'User Login', 'errors' => $errors]);

}

$user = $db->query("SELECT * from users where email = :email", ['email' => $email])->find();

if (!$user || !password_verify($password, $user['password'])) {

    $errors['credentials'][] = 'Wrong credentials';

    http_response_code(Response::HTTP_UNPROCESSABLE_CONTENT);
    return view('session/create.view.php', ['heading' => 'User Login', 'errors' => $errors]);
}

login(['name' => $user['name'], 'email' => $user['email']]);

header("Location: /");

exit;
