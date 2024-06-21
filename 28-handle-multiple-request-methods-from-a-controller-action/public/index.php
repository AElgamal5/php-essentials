<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    require basePath(str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php');
});

require basePath('Core/router.php');
