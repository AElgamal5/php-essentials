<?php

use Core\Session;

return view(
    'register/create.view.php',
    [
        'heading' => 'User Register',
        'errors' => Session::get('errors')
    ]
);
