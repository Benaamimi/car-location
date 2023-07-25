<?php

namespace App\Controller\Front;

class CarController
{
    public function index($params)
    {
        $params['test'];
        require_once "../templates/front/car.php";
   
    }

}