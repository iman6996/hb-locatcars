<?php

use App\Service\ServiceContainer;

$configuration = [
    'db' => [
        'dsn' => 'mysql:dbname=hblocatcars;localhost;port=3306;chartset=utf8',
        'username' => 'root',
        'password' => 'root',
    ]
];
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/../vendor/autoload.php';
$container = new ServiceContainer($configuration);
require_once __DIR__ . '/routes.php';
