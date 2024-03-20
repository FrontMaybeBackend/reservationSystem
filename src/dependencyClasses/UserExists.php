<?php

namespace src\dependencyClasses;
require_once __DIR__ . "/../../includes/autoloader.php";

use database\Connect;
use Exception;

class UserExists extends Connect
{
    protected string $email;
    public function __construct(string $email)
    {
        $this->email =$email;
    }

    public function checkUser()
    {
        try {
            $conn = new Connect();
            $stmt = $conn->newConnect();
            $sql = $stmt->prepare(('SELECT email FROM users WHERE email = ?'));
            $sql->bindValue(1, $this->email);
            $sql->execute();
            $result = $sql->fetch();
            if($result){
                return true;
            }
        } catch (Exception $e) {
            echo 'Wystąpił błąd: ' . $e->getMessage();
        }
        return false;
    }
}