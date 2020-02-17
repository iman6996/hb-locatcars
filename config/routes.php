<?php

use App\Controller\UserController;
use App\Controller\UsersController;

$router = $container->getRouter();

$router->setNamespace('App\Controller');

$router->get('/users' ,'CarsController@index');
$router->post('/cars' ,'CarsController@create');

$router->get('/cars' ,'UsersController@index');

$router->get('/cars/new' ,'UsersController@new');



$router->run();
