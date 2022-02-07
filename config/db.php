<?php

use yii\db\Connection;
return [
//    'class'    => Connection::class,
//    'dsn'      => 'pgsql:host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_NAME'],
//    'username' => $_ENV['DB_USER'],
//    'password' => $_ENV['DB_PASSWORD'],
//    'charset'  => 'utf8',

    'class'    => Connection::class,
    'dsn'      => 'pgsql:host=postgres13;port=5432;dbname=admin_bpm',
    'username' => 'user',
    'password' => 'password',
    'charset'  => 'utf8',
];
