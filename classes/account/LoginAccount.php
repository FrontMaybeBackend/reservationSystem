<?php

namespace classes\account;

use classes\database\Connect;
use Exception;

require_once __DIR__ . "/../../includes/autoloader.php";

class LoginAccount extends Connect
{

    protected $email;

    protected $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }


    public function loginUser()
    {
        try {
            $conn = new Connect();
            $stmt = $conn->newConnect();
            $sql = $stmt->prepare('SELECT email FROM users WHERE email = ? AND password = ?');
            $sql->bindValue(1, $this->email);
            $sql->bindValue(2, $this->password);
            $sql->execute();

        } catch (Exception $e) {
            echo 'Wystąpił błąd: ' . $e->getMessage();
        }
    }



}