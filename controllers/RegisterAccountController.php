<?php

namespace controllers;


use classes\account\RegisterAccountValidation;
use classes\compositionClasses\UserExists;

require_once __DIR__ . "/../includes/autoloader.php";


class RegisterAccountController extends RegisterAccountValidation
{


    public function __construct($name, $surname, $password, $email, $phone)
    {

    }

    public function newAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS,);
            $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
            $userExists = new UserExists($email);

            $checkValidation = new RegisterAccountValidation($username, $surname, $password, $email, $phone, $userExists);
            $checkValidation->checkValidation();
        }
    }


}