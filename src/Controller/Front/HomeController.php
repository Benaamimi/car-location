<?php

namespace App\Controller\Front;

use App\Model\Car;



use App\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index()
    {
        $this->pdo;
        $car = new Car();
        $cars=$car->getCars();
        require_once '../templates/front/home.php';
        
    }
}