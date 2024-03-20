<?php

namespace src\models;

use database\Connect;
use Exception;

require_once __DIR__ . "/../../includes/autoloader.php";
class Hotels extends Connect
{
    public $results;
    public function getHotel()
    {
        try {
            $conn = new Connect();
            $stmt = $conn->newConnect();
            $sql = $stmt->prepare('SELECT  Name,Address,Phone,Stars,CheckinTime,CheckoutTime,COUNT(roomID) FROM hotel INNER JOIN rooms ON hotel.HotelID = rooms.hotelID WHERE rooms.usersID IS NULL GROUP BY hotel.hotelID; ');
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