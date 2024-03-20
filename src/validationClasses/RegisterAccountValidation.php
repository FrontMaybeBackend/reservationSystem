<?php

namespace src\validationClasses;

use src\dependencyClasses\UserExists;
use src\models\RegisterAccount;

require_once __DIR__ . "/../../includes/autoloader.php";

class RegisterAccountValidation extends RegisterAccount
{

    protected $userExists;

    public function __construct(string $name, string $surname, string $password, string $email, ?string $phone, UserExists $userExists)
    {
        $this->userExists = $userExists;
        parent::__construct($name, $surname, $password, $email, $phone);
    }


    public function checkValidation()
    {
        try {
            if ($this->checkEmpty()) {
                throw new \Exception("Pola nie mogą być puste");
            } elseif (!$this->checkLength()) {
                throw new \Exception("Name i surname maksymalnie 12 liter");
            } elseif ($this->checkFormat()) {
                throw new \Exception("Imię i nazwa uzytkownika mogą zawierać tylko litery");
            } elseif ($this->checkUserExit()) {
                throw new \Exception("Podany adres mailowy jest już zajęty");
            } else {
                return true;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }


    public function checkEmpty()
    {
        $check = false;
        foreach ($this as $key) {
            if (empty($key)) {
                $check = true;
            }
        }
        return $check;
    }

    public function checkLength()
    {
        $check = false;
        if (strlen($this->name) <= 12 || strlen($this->surname) <= 12) {
            $check = true;
        }
        return $check;
    }

    public function checkFormat()
    {
        $check = false;
        $pattern = "/^[a-zA-Z]+$/";
        if (!preg_match($pattern, $this->surname) || !preg_match($pattern, $this->name)) {
            $check = true;
        }
        return $check;
    }

    public function checkUserExit()
    {
        $check = false;
        if ($this->userExists->checkUser()) {
            $check = true;
        }
        return $check;

    }


}