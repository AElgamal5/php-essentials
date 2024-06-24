<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUser = 1;

$note = $db->query("select * from notes where id = :id", ['id' => $_POST['id']])->findOrFail();

isAuthorize($note['user_id'] == $currentUser);

$errors = [];
$message = null;

if (!Validator::string($_POST['body'], 3, 500)) {
    $errors['body'] = "Body of length not more than 500 is required.";
}

if (empty($errors)) {
    $db->query("UPDATE notes SET body = :body WHERE id = :id", ['body' => $_POST['body'], 'id' => $_POST['id']]);
    $message = "Note updated successfully";
} else {
    http_response_code(Response::HTTP_UNPROCESSABLE_CONTENT);
}

return view('notes/edit.view.php', ['heading' => "Edit A Note", 'message' => $message, 'errors' => $errors]);
