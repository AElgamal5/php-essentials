<?php

use Core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);

$notes = $db->query("select * from notes where user_id = :id", ['id' => 1])->get();

view('notes/index.view.php', ['heading' => 'My Notes', 'notes' => $notes]);
