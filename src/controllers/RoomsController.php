<?php

namespace src\controllers;

use src\models\Rooms;

class RoomsController extends Rooms
{
    public array $results;

    public function show() {
        $getHotel = new Rooms();
        $getHotel->getRooms();
        $this->results = $getHotel->results;
    }

}