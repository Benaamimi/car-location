<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;

class CarController extends AbstractController
{
    public function index()
    {
       
        require_once "../templates/front/car.php";
   
    }

}