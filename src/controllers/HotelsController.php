<?php

namespace src\controllers;



use src\models\Hotels;

require_once __DIR__ . "/../../includes/autoloader.php";
class HotelsController extends Hotels
{
    public $results;

    public function show()
    {
        $getHotel = new Hotels();
        $getHotel->getHotel();
        $this->results = $getHotel->results;
    }

}