<?php

namespace src\controllers;


use src\dependencyClasses\UserExists;
use src\models\RegisterAccount;
use src\validationClasses\RegisterAccountValidation;



require_once __DIR__ . "/../../includes/autoloader.php";


class RegisterAccountController extends RegisterAccountValidation
{
    protected string $name;

    protected string $surname;

    protected string $password;

    protected string $email;

    protected ?string $phone;



    public function __construct(string $name, string $surname, string $password, string $email, ?string $phone)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function newAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS,);
            $this->surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, );
            $this->password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $this->phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
            $userExists = new UserExists($this->email);

            $checkValidation = new RegisterAccountValidation($this->name, $this->surname, $this->password, $this->email, $this->phone, $userExists);


            if($checkValidation->checkValidation() === true){
                $newUser = new RegisterAccount($this->name, $this->surname, password_hash($this->password, PASSWORD_DEFAULT), $this->email, $this->phone);
                $newUser->registerNew();
                header("Location: ../register/register.succesfully.html");
            }
        }
    }


}