<?php

namespace App\Controller;



class CarsController extends AbstractController
{

    public function index()
    {

        $cars = $this->container->getCarManager()->findAll();

    }
}
