<?php

$heading = "Create A Note";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    dd(["You have submit the form with:", $_POST]);
}

require './views/noteCreate.view.php';
