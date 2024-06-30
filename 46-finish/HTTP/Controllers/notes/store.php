<?php

use Core\App;
use Core\Session;
use Core\Database;
use HTTP\Forms\StoreNoteForm;

StoreNoteForm::validate($attributes = ['body' => $_POST['body']]);

App::resolve(Database::class)
    ->query(
        "INSERT INTO notes (body, user_id) VALUES (:body, :user)",
        [
            'body' => $attributes['body'],
            'user' => Session::get('user')['id']
        ]
    );

Session::flash('message', 'Note created successfully');

redirect('/notes/create');
