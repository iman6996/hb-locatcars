<?php

use App\Controller\UserController;
use App\Controller\UsersController;

$router = $container->getRouter();

$router->setNamespace('App\Controller');

$router->get('/cars' ,'CarsController@index');
$router->post('/cars' ,'CarsController@create');

$router->get('/users' ,'UsersController@index');
$router->get('/users/(\d+)' ,'UsersController@show');

$router->get('/users/new' ,'UsersController@new');
$router->post('/users' ,'UsersController@create');

$router->get('/users/edit(\d+)' ,'UsersController@edit');
$router->post('/users/edit(\d+)' ,'UsersController@update');




$router->run();
