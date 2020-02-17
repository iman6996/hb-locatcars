<?php

use App\Service\ServiceContainer;

$configuration = [
    'db' => [
        'dsn' => 'mysql:dbname=cars;localhost;port=3306;charset=utf8',
        'username' => 'root',
        'password' => '',
    ],
    'env' =>[
        'base_path'=> 'http://localhost/Test%20php/hb-locatcars/'
    ]
];

require_once __DIR__ . '/../vendor/autoload.php';
$container = new ServiceContainer($configuration);
/* 
$loader = new \Twig\Loader\ArrayLoader([
    'index' => 'Hello {{ name }}!',
]);
$twig = new \Twig\Environment($loader);
echo $twig->render('index', ['name' => 'Fabien']);
die; */

require_once __DIR__ . '/routes.php';

