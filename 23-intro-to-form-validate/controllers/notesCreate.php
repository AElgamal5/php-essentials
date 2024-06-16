<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Create A Note";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    if (strlen($_POST['body']) == 0) {
        $errors['body'] = "Body is required.";
    }

    if (strlen($_POST['body']) > 500) {
        $errors['body'] = "Body can't be more than 500 characters.";
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user)", ['body' => $_POST['body'], 'user' => 1]);
        http_response_code(Response::HTTP_CREATED);
    } else {
        http_response_code(Response::HTTP_UNPROCESSABLE_CONTENT);
    }
}

require './views/noteCreate.view.php';
