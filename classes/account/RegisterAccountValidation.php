<?php

namespace classes\account;
require_once __DIR__ . "/../../includes/autoloader.php";
class RegisterAccountValidation extends RegisterAccount
{

    public function __construct($name, $surname, $password, $email, $phone)
    {
        parent::__construct($name, $surname, $password, $email, $phone);
    }

   private  $errors = [
       'Empty'=>"Inputs cant be empty",
       'Email'=>"Bad format for email",
       'Length'=> "Name and surname only can have 12 letters",
       'String'=> "Name and surname only can have letters",
   ];


    public function checkValidation(){
        $check = false;
        if($this->checkEmpty()){
            $check = true;
        }elseif($this->checkLength()){
            $check = true;
        }elseif ($this->checkFormat()){
            $check = true;
        }elseif ($this->checkUserExit()){
            $check = true;
        }
        else{
            $newUser = new RegisterAccount($this->name,$this->surname,password_hash($this->password,PASSWORD_DEFAULT), $this->email, $this->phone);
            $newUser->registerNew();
            echo "udało się zarejestrować";
        }
        return $check;

    }


    public function checkEmpty(){
        $check = false;
        foreach($this as $key){
            if(empty($key)){
                $check = true;
                echo $this->errors['Empty']  ;
            }
        }
        return $check;
    }

    public function checkLength(){
        $check = false;
        if(strlen($this->name < 12) || strlen($this->surname < 12)){
            $check = true;
            echo $this->errors['Length'];
        }
        return $check;
    }

    public function checkFormat(){
        $check = false;
        $pattern = "/^[a-zA-Z]+$/";
        if (!preg_match($pattern, $this->surname) || !preg_match($pattern, $this->name)) {
            $check = true;
            echo $this->errors['String'];
        }
        return $check;
    }

    public function checkUserExit()
    {
        $check = false;
        if($this->checkUser($this->email)){
            $check = true;
            echo " zajęty adres mailowy";
        }
        return $check;

    }


}