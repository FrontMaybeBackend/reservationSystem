<?php

namespace classes\account;
use classes\compositionClasses\UserExists;

require_once __DIR__ . "/../../includes/autoloader.php";
class LoginAccountValidation extends LoginAccount
{

    protected  $userExists;
   public function __construct($email, $password, UserExists $userExists)
   {
       $this->userExists = $userExists;
       parent::__construct($email, $password);
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
        }elseif ($this->checkUserExit()){
            $check = true;
        }elseif($this->comparePassword()){
            $check = true;
        }
        else{
            $newUser = new LoginAccount($this->email,$this->password);
            $newUser->loginUser();
            echo "udało się zalogować";
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


    public function checkUserExit()
    {
        $check = false;
        if(!$this->userExists->checkUser()){
            $check = true;
            echo "nie mamy takiego uzytkownika";
        }
        return $check;

    }






}