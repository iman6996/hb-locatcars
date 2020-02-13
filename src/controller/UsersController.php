<?php

namespace App\Controller;



class UsersController extends AbstractController
{

    public function list()
    {

        $users = $this->container->getUserManager()->findAll();

    }
}
