<?php
return [
    'default' => env('DB_CONNECTION', 'dbcore'),
    'migrations' => 'migrations',
    'connections' => [
        'dbcore' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'dbtransaction' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_TRANS', 'localhost'),
            'port' => env('DB_PORT_TRANS', '3306'),
            'database' => env('DB_DATABASE_TRANS', 'forge'),
            'username' => env('DB_USERNAME_TRANS', 'forge'),
            'password' => env('DB_PASSWORD_TRANS', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'dbhistory' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_HISTORY', 'localhost'),
            'port' => env('DB_PORT_HISTORY', '3306'),
            'database' => env('DB_DATABASE_HISTORY', 'forge'),
            'username' => env('DB_USERNAME_HISTORY', 'forge'),
            'password' => env('DB_PASSWORD_HISTORY', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],
    ],
];
