<?php

namespace src\models;

use database\Connect;

class Rooms extends Connect
{
    public array $results;
    public function getRooms()
    {
        try {
            $conn = new Connect();
            $stmt = $conn->newConnect();
            $sql = $stmt->prepare('SELECT * FROM rooms INNER JOIN hotel ON rooms.hotelID=hotel.HotelID; ');
            $sql->execute();
            $this->results = $sql->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($this->results as $result){
                return $result;
            }
        } catch (Exception $e) {
            echo 'Wystąpił błąd: ' . $e->getMessage();
        }
    }

}