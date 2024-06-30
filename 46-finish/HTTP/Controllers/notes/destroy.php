<?php

use Core\App;
use Core\Session;
use Core\Database;

$db = App::resolve(Database::class);

$noteId = $_POST['id'];

$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    [
        'id' => $noteId
    ]
)->findOrFail();

isAuthorize($note['user_id'] == Session::get('user')['id']);

$db->query(
    'DELETE FROM notes WHERE id = :id',
    [
        'id' => $noteId
    ]
);

return redirect('/notes');
