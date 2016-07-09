<?php
return array(
    'pdo' => 'sqlite:./../config/phonebook.db',
	
	'routes' => include_once __DIR__.'/routes.php',

    'user' => array(
        'admin' => 'admin',
        'manager' => 'manager'
    ),
);
