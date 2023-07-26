<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Model\Car;



class reservationController extends AbstractController
{
    public function index($params)
    {
        $car = new Car();
        $id = $params['id'];
        $carById = $car -> getCarByid($id);
        require_once "../templates/front/reservation.php";
    }

}