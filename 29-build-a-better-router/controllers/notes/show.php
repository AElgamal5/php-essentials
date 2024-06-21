<?php

use Core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);

$currentUser = 1;

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

isAuthorize($note['user_id'] == $currentUser);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $db->query('delete from notes where id = :id', ['id' => $_POST['id']]);
    header('Location: /notes');
    die();

} else {

    view('notes/show.view.php', ['heading' => 'Note', 'note' => $note]);

}
