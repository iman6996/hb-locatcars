<?php

use App\Controller\UserController;
use App\Controller\UsersController;

$router = $container->getRouter();

$router->get('/hello', function() {
    echo "hello world";
});



$router->run();
