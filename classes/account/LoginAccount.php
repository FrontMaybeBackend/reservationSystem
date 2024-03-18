<?php

namespace classes\account;

use classes\database\Connect;
use Exception;

require_once __DIR__ . "/../../includes/autoloader.php";

class LoginAccount extends Connect
{

    protected string $email;

    protected string $password;



    public function __construct(string $email, string $password)
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

    public function getPassword($email,$password){
        try {
            $conn = new Connect();
            $stmt = $conn->newConnect();
            $sql = $stmt->prepare('SELECT password FROM users WHERE email = ?');
            $sql->bindValue(1, $email);
            $sql->execute();
            $result = $sql->fetch();
            if($result){
                $hashPass = $result['password'];
                $passFromForm = $password;
                if(password_verify($passFromForm,$hashPass)){
                   return true;
                }else{
                    return false;
                }
            }
        } catch (Exception $e) {
            echo 'Wystąpił błąd: ' . $e->getMessage();
        }
        return false;
    }




}