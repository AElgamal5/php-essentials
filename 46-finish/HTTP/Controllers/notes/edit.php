<?php

use Core\App;
use Core\Session;
use Core\Database;

$db = App::resolve(Database::class);

$noteId = $_GET['id'];

$note = $db->query(
    "SELECT * FROM notes WHERE id = :id",
    ['id' => $noteId]
)->findOrFail();

isAuthorize($note['user_id'] == Session::get('user')['id']);

view('notes/edit.view.php', [
    'heading' => 'Edit A Note',
    'note' => $note,
    'errors' => Session::get('errors'),
    'message' => Session::get('message')
]);
