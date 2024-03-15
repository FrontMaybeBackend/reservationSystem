<?php

namespace controllers;

use classes\hotels\GetHotels;
require_once __DIR__ . "/../includes/autoloader.php";
class HotelsController extends GetHotels
{
    public $results;

    public function show()
    {
        $getHotel = new GetHotels();
        $getHotel->getHotel();
        $this->results = $getHotel->results;
    }

}