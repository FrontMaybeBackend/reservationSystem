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
            $sql = $stmt->prepare('SELECT * FROM hotel ');
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