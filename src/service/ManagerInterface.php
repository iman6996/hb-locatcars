<?php 
namespace App\Service;

interface ManagerInterface {

    public function findAll();
    public function findById(int $id);
    public function findByField(string $field, string $value);
    public function arrayToObject();
}

?>