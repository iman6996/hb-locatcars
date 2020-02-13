<?php

namespace App\Service;

use App\Model\Car;
use PDO;

class CarManager
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }



    public function arrayToObject(array $array)
    {
        $car = new car;
        $car->setId($array['id']);
        $car->setBrand($array['brand']);
        $car->setModel($array['model']);
        return $car;
    }
    /**
     * @return Car[] 
     */

    public function findAll()
    {
        $query = "SELECT * FROM car";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $cars = [];

        foreach ($data as $d) {
            $cars[] = $this->arrayToObject($d);
        }


        return $cars;
    }

    /**
     * @param int 
     * 
     */

    public function findOneById(int $id)
    {
    }


    public function findByField(string $field, string $value)
    {
    }
}
