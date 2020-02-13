<?php

namespace App\Controller;

class AbstractController
{

    protected $container;
    public function __construct()
    {
        global $container;
        $this->container = $container;
    }
}
