<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];
$message = null;

if (!Validator::string($_POST['body'], 3, 500)) {
    $errors['body'] = "Body of length not more than 500 is required.";
}

if (empty($errors)) {
    $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user)", ['body' => $_POST['body'], 'user' => 1]);
    $message = "Note created successfully";
    http_response_code(Response::HTTP_CREATED);
} else {
    http_response_code(Response::HTTP_UNPROCESSABLE_CONTENT);
}

return view('notes/create.view.php', ['heading' => "Create A Note", 'message' => $message, 'errors' => $errors]);
