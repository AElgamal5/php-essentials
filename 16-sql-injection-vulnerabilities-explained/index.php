<?php

require 'functions.php';
// require 'router.php';
require 'Database.php';


$config = require 'config.php';

$db = new Database($config['database']);


$id = $_GET['id'];

$post = $db->query("select * from posts where id = :id", ['id' => $id])->fetch(PDO::FETCH_ASSOC);

dd($post);