<?php

namespace controllers;

use classes\account\LoginAccountValidation;
use classes\compositionClasses\UserExists;

require_once __DIR__ . "/../includes/autoloader.php";

class LoginAccountController extends LoginAccountValidation
{
    protected  string $email;
    protected  string $password;
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $this->password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $userExists = new UserExists($this->email);


            $checkValidation = new LoginAccountValidation($this->email, $this->password, $userExists);
            $checkValidation->checkValidation();

        }
    }

}