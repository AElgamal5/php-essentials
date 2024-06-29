<?php

$router->get('/', 'home.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

//notes routes
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');
$router->get('/notes/create', 'notes/create.php')->only('auth');
$router->post('/notes', 'notes/store.php')->only('auth');
$router->get('/note/edit', 'notes/edit.php')->only('auth');
$router->patch('/note', 'notes/update.php')->only('auth');
$router->delete('/note', 'notes/destroy.php')->only('auth');

//auth
$router->get('/register', 'register/create.php')->only('guest');
$router->post('/register', 'register/store.php')->only('guest');
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');
