<?php

namespace classes\account;

use classes\database\Connect;
use Exception;

require_once __DIR__ . "/../../includes/autoloader.php";


class RegisterAccount extends Connect
{
    protected string $name;
    protected string $surname;

    protected string $password;
    protected string $email;
    protected ?string $phone;

    public function __construct(string $name, string $surname,string $password, string$email, ?string $phone)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function registerNew()
    {
        try {
            $conn = new Connect();
            $stmt = $conn->newConnect();
            $sql = ('INSERT INTO users (name, surname, password, email, phone) VALUES (?, ?, ?, ?, ?)');
            $insert = $stmt->prepare($sql);
            $insert->bindValue(1, $this->name);
            $insert->bindValue(2, $this->surname);
            $insert->bindValue(3, $this->password);
            $insert->bindValue(4, $this->email);
            $insert->bindValue(5, $this->phone);
            $insert->execute();
        } catch (Exception $e) {
            echo 'Wystąpił błąd: ' . $e->getMessage();
        }

    }


}