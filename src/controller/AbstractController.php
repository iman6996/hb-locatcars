<?php

namespace App\Controller;

class AbstractController
{

    protected $container;
    protected $config;


    public function __construct()
    {
        global $container;
        $this->container = $container;

    global $configuration;
    $this->config = $configuration;
    }

    

}
