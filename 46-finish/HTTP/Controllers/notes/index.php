<?php

use Core\App;
use Core\Session;
use Core\Database;

$notes = App::resolve(Database::class)->query(
    "select * from notes where user_id = :id",
    [
        'id' => Session::get('user')['id']
    ]
)->get();

view(
    'notes/index.view.php',
    [
        'heading' => 'My Notes',
        'notes' => $notes
    ]
);
