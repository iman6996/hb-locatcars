<?php 

namespace App\Controller;

class CarsController{

public function index(){
$cars =[ 
    [
        "brand" =>"Ford",
        "model" =>"Fiesta",
    ],
    [
        "brand"=>"Citroën",
        "model"=>"C3",
    ],
];



    include __DIR__ .'/../../template/cars/index.php';
}
}


?>