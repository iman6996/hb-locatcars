<?php

use App\Controller\UserController;
use App\Controller\UsersController;

$router = $container->getRouter();

$router->setNamespace('App\Controller');
$router->get('/cars' ,'CarsController@index');
$router->get('/users' ,'UsersController@index');


$router->run();
