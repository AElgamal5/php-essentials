<?php

require './Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Create A Note";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

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

require './views/noteCreate.view.php';
