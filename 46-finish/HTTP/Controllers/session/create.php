<?php

use Core\Session;

return view(
    'session/create.view.php',
    [
        'heading' => 'User Login',
        'errors' => Session::get('errors')
    ]
);
