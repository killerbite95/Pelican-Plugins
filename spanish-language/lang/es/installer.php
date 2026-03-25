<?php

return [
    'title' => 'Instalador del Panel',
    'requirements' => [
        'title' => 'Requisitos del Servidor',
        'sections' => [
            'version' => [
                'title' => 'Versión de PHP',
                'or_newer' => ':version o superior',
                'content' => 'Tu versión de PHP es :version.',
            ],
            'extensions' => [
                'title' => 'Extensiones de PHP',
                'good' => 'Todas las extensiones de PHP necesarias están instaladas.',
                'bad' => 'Faltan las siguientes extensiones de PHP: :extensions',
            ],
            'permissions' => [
                'title' => 'Permisos de Carpetas',
                'good' => 'Todas las carpetas tienen los permisos correctos.',
                'bad' => 'Las siguientes carpetas tienen permisos incorrectos: :folders',
            ],
        ],
        'exception' => 'Faltan algunos requisitos',
    ],
    'environment' => [
        'title' => 'Entorno',
        'fields' => [
            'app_name' => 'Nombre de la Aplicación',
            'app_name_help' => 'Este será el nombre de tu Panel.',
            'app_url' => 'URL de la Aplicación',
            'app_url_help' => 'Esta será la URL desde la que accederás a tu Panel.',
            'account' => [
                'section' => 'Usuario Administrador',
                'email' => 'Correo electrónico',
                'username' => 'Nombre de usuario',
                'password' => 'Contraseña',
            ],
        ],
    ],
    'database' => [
        'title' => 'Base de Datos',
        'driver' => 'Motor de Base de Datos',
        'driver_help' => 'El motor utilizado para la base de datos del panel. Recomendamos "SQLite".',
        'fields' => [
            'host' => 'Host de la Base de Datos',
            'host_help' => 'El host de tu base de datos. Asegúrate de que sea accesible.',
            'port' => 'Puerto de la Base de Datos',
            'port_help' => 'El puerto de tu base de datos.',
            'path' => 'Ruta de la Base de Datos',
            'path_help' => 'La ruta de tu archivo .sqlite relativa a la carpeta de base de datos.',
            'name' => 'Nombre de la Base de Datos',
            'name_help' => 'El nombre de la base de datos del panel.',
            'username' => 'Usuario de la Base de Datos',
            'username_help' => 'El nombre de tu usuario de base de datos.',
            'password' => 'Contraseña de la Base de Datos',
            'password_help' => 'La contraseña de tu usuario de base de datos. Puede estar vacía.',
        ],
        'exceptions' => [
            'connection' => 'Error de conexión a la base de datos',
            'migration' => 'Error al ejecutar las migraciones',
        ],
    ],
    'egg' => [
        'title' => 'Eggs',
        'no_eggs' => 'No hay Eggs disponibles',
        'background_install_started' => 'Instalación de Egg iniciada',
        'background_install_description' => 'La instalación de :count eggs se ha puesto en cola y continuará en segundo plano.',
        'exceptions' => [
            'failed_to_update' => 'Error al actualizar el índice de eggs',
            'no_eggs' => 'No hay eggs disponibles para instalar en este momento.',
            'installation_failed' => 'Error al instalar los eggs seleccionados. Por favor, impórtalos después de la instalación desde la lista de eggs.',
        ],
    ],
    'session' => [
        'title' => 'Sesión',
        'driver' => 'Motor de Sesión',
        'driver_help' => 'El motor utilizado para almacenar sesiones. Recomendamos "Filesystem" o "Database".',
    ],
    'cache' => [
        'title' => 'Caché',
        'driver' => 'Motor de Caché',
        'driver_help' => 'El motor utilizado para el almacenamiento en caché. Recomendamos "Filesystem".',
        'fields' => [
            'host' => 'Host de Redis',
            'host_help' => 'El host de tu servidor Redis. Asegúrate de que sea accesible.',
            'port' => 'Puerto de Redis',
            'port_help' => 'El puerto de tu servidor Redis.',
            'username' => 'Usuario de Redis',
            'username_help' => 'El nombre de tu usuario de Redis. Puede estar vacío.',
            'password' => 'Contraseña de Redis',
            'password_help' => 'La contraseña de tu usuario de Redis. Puede estar vacía.',
        ],
        'exception' => 'Error de conexión a Redis',
    ],
    'queue' => [
        'title' => 'Cola',
        'driver' => 'Motor de Cola',
        'driver_help' => 'El motor utilizado para gestionar colas. Recomendamos "Database".',
        'fields' => [
            'done' => 'He completado ambos pasos a continuación.',
            'done_validation' => '¡Debes completar ambos pasos antes de continuar!',
            'crontab' => 'Ejecuta el siguiente comando para configurar tu crontab. Ten en cuenta que <code>www-data</code> es tu usuario del servidor web. ¡En algunos sistemas este nombre de usuario puede ser diferente!',
            'service' => 'Para configurar el servicio del trabajador de cola simplemente ejecuta el siguiente comando.',
        ],
    ],
    'exceptions' => [
        'write_env' => 'No se pudo escribir en el archivo .env',
        'migration' => 'No se pudieron ejecutar las migraciones',
        'create_user' => 'No se pudo crear el usuario administrador',
    ],
    'finish' => 'Finalizar',
];
