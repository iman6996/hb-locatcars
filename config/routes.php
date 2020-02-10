<?php

use App\Controller\UserController;
use App\Controller\UsersController;

$router = $container->getRouter();

$router->setNamespace('App\Controller');
$router->get('/cars' ,'CarsController@index');


$router->run();
