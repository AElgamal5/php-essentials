<?php

use Core\App;
use Core\Session;
use Core\Database;
use HTTP\Forms\UpdateNoteForm;

$db = App::resolve(Database::class);

UpdateNoteForm::validate($attributes = ['body' => $_POST['body']]);

$noteId = $_POST['id'];

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $noteId])->findOrFail();

isAuthorize($note['user_id'] == Session::get('user')['id']);

$db->query(
    "UPDATE notes SET body = :body WHERE id = :id",
    [
        'body' => $attributes['body'],
        'id' => $noteId
    ]
);

Session::flash('message', 'Note updated successfully');

return redirect('/notes');
