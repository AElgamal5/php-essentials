<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Create A Note";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user)", ['body' => $_POST['body'], 'user' => 1]);
}

require './views/noteCreate.view.php';
