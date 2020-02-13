<?php

namespace App\Service;

use Bramus\Router\Router;
use PDO;
use App\Service\CarManager;
use App\Service\UserManager;


class ServiceContainer
{

    private $router;
    private $pdo;
    private $CarManager;
    private $configuration;
    private $UserManager;



    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getRouter()
    {
        if ($this->router === null) {
            $this->router = new Router;
        }
        return $this->router;
    }

    /**
     * Get the value of pdo
     */
    public function getPdo()
    {
        if ($this->pdo === null) {
            $this->pdo = new PDO(
                $this->configuration['db']['dsn'],
                $this->configuration['db']['username'],
                $this->configuration['db']['password']
            );
        }
        return $this->pdo;
    }


    public function getCarManager(){
        if ($this->CarManager === null) {
            $this->CarManager = new CarManager($this->getPdo());
        }
        return $this->CarManager;

    }

    public function getUserManager(){
        if ($this->UserManager === null) {
            $this->UserManager = new UserManager($this->getPdo());
        }
        return $this->UserManager;

    }
}
