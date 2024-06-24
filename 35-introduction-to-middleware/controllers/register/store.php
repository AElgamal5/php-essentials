<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Validator;


$db = App::resolve(Database::class);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::required($name)) {
    $errors['name'][] = "Name is required.";
}
if (!Validator::string($name, 3, 255)) {
    $errors['name'][] = "name of length should be between 3 and 255 character.";
}

if (!Validator::required($email)) {
    $errors['email'][] = "email is required.";
}
if (!Validator::email($email)) {
    $errors['email'][] = "Not a valid email.";
}
if (!Validator::unique($email, 'users', 'email')) {
    $errors['email'][] = "This email is already used.";
}

if (!Validator::required($password)) {
    $errors['password'][] = "password is required.";
}
if (!Validator::string($password, 6, 255)) {
    $errors['password'][] = "password of length should be between 6 and 255 character.";
}

if (empty($errors)) {

    $db->query(
        "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)",
        ['name' => $name, 'email' => $email, 'password' => $password]
    );

    $_SESSION['user'] = ['name' => $name, 'email' => $email, 'password' => $password];

    header("Location: /");

    exit;
}


http_response_code(Response::HTTP_UNPROCESSABLE_CONTENT);
return view('register/create.view.php', ['heading' => 'User Register', 'errors' => $errors]);
