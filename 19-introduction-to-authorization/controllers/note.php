<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Note";
$currentUser = 1;


$note = $db->query(
    "select * from notes where id = :id",
    ['id' => $_GET['id']]
)->fetch();

if (!$note) {
    abort();
} elseif ($note['user_id'] != $currentUser) {
    abort(Response::HTTP_FORBIDDEN);
}


require './views/note.view.php';
