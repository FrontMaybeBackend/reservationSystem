<?php

namespace controllers;

use classes\account\LoginAccountValidation;
use classes\compositionClasses\UserExists;

require_once __DIR__ . "/../includes/autoloader.php";

class LoginAccountController extends LoginAccountValidation
{
    public function __construct($email, $password)
    {

    }

    public function loginUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $userExists = new UserExists($email);


            $checkValidation = new LoginAccountValidation($email, $password, $userExists);
            $checkValidation->checkValidation();

        }
    }

}