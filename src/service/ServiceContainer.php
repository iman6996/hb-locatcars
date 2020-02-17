<?php

namespace App\Service;

use Bramus\Router\Router;
use PDO;
use App\Service\CarManager;
use App\Service\UserManager;
use Error;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class ServiceContainer
{

    private $router;
    private $pdo;
    private $CarManager;
    private $configuration;
    private $UserManager;
    private $twig;



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
    public function getTwig() {

        if ($this->twig === null) {
            try {
                // On dit que nos templates seront dans le dossier template
                $loader = new FilesystemLoader(__DIR__ . '/../../template');
                $twig = new Environment($loader);
                $twig->addGlobal('env', $this->configuration['env']);
                $this->twig = $twig;
            }
            catch(Error $e) {
                var_dump($e);
            }
        }
        return $this->twig;
    }
}
