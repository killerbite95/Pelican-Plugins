<?php

return [
    'greeting' => '¡Hola :name!',

    'account_created' => [
        'body' => 'Recibes este correo porque se ha creado una cuenta para ti en :app.',
        'username' => 'Nombre de usuario: :username',
        'email' => 'Correo electrónico: :email',
        'action' => 'Configura tu cuenta',
    ],

    'added_to_server' => [
        'body' => 'Has sido añadido como subusuario del siguiente servidor, lo que te otorga cierto control sobre él.',
        'server_name' => 'Nombre del servidor: :name',
        'action' => 'Ver servidor',
    ],

    'removed_from_server' => [
        'body' => 'Has sido eliminado como subusuario del siguiente servidor.',
        'server_name' => 'Nombre del servidor: :name',
        'action' => 'Ver panel',
    ],

    'server_installed' => [
        'body' => 'Tu servidor ha terminado de instalarse y ya está listo para usar.',
        'server_name' => 'Nombre del servidor: :name',
        'action' => 'Iniciar sesión y comenzar',
    ],

    'mail_tested' => [
        'subject' => 'Mensaje de prueba del Panel',
        'body' => 'Esta es una prueba del sistema de correo del Panel. ¡Todo funciona correctamente!',
    ],
];
