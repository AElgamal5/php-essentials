<?php

$config = require 'config.php';

$db = new Database($config['database']);

$notes = $db->query("select * from notes where user_id = :id", ['id' => 1])->fetchAll();

$heading = "My Notes";

require './views/notes.view.php';