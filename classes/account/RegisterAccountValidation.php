<?php

namespace classes\account;
require_once __DIR__ . "/../../includes/autoloader.php";
class RegisterAccountValidation extends RegisterAccount
{

    public function __construct($name, $surname, $password, $email, $phone)
    {
        parent::__construct($name, $surname, $password, $email, $phone);
    }

   private $errors = [
       'Empty'=>"Inputs cant be empty",
       'Email'=>"Bad format for email",
   ];


    public function checkValidation(){
        $check = false;
        if($this->checkEmpty()){
            $check = true;
        }else{
            $newUser = new RegisterAccount($this->name,$this->surname,$this->password, $this->email, $this->phone);
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
            }else{
                foreach($this as $key => $value){
                    echo "$key =>$value" . "<br>";
                }
            }
        }
        return $check;
    }


}