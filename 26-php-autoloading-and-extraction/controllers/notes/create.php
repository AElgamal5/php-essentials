<?php

require basePath('core/Validator.php');

$config = require basePath('config.php');
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!Validator::string($_POST['body'], 3, 500)) {
        $errors['body'] = "Body of length not more than 500 is required.";
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user)", ['body' => $_POST['body'], 'user' => 1]);
        http_response_code(Response::HTTP_CREATED);
    } else {
        http_response_code(Response::HTTP_UNPROCESSABLE_CONTENT);
    }
}

view('notes/create.view.php', ['heading' => "Create A Note", 'errors' => $errors]);
