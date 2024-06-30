<?php

use Core\App;
use Core\Session;
use Core\Database;

$note = App::resolve(Database::class)
    ->query(
        "select * from notes where id = :id",
        [
            'id' => $_GET['id']
        ]
    )->findOrFail();

isAuthorize($note['user_id'] == Session::get('user')['id']);

view('notes/show.view.php', ['heading' => 'Note', 'note' => $note]);
