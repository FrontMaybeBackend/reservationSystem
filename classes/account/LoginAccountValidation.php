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



    public function checkValidation(){
        $check = false;
        try {
            if ($this->checkEmpty()) {
                $check = true;
                throw new \Exception("Pola nie mogą być puste");
            } elseif ($this->checkUserExit()) {
                $check = true;
                throw new \Exception("Nie mamy takiego użytkownika, zarejestruj się");
            } elseif (!$this->getPassword($this->email, $this->password)) {
                $check = true;
                throw new \Exception("Błędne hasło");
            } else {
                $newUser = new LoginAccount($this->email, $this->password);
                $newUser->loginUser();
                throw new \Exception("Udało się zalogować");
            }
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        return $check;

    }


    public function checkEmpty(){
        $check = false;
        foreach($this as $key){
            if(empty($key)){
                $check = true;
            }
        }
        return $check;
    }


    public function checkUserExit()
    {
        $check = false;
        if(!$this->userExists->checkUser()){
            $check = true;
        }
        return $check;

    }





}