<?php

namespace database;

use PDO;
use PDOException;

class Connect
{


    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=reservation', 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Failed:" . $e->getMessage();
        }
    }

    public function newConnect()
    {
        return $this->conn;
    }

    public function closeConnect()
    {
        return $this->conn = null;
    }
}