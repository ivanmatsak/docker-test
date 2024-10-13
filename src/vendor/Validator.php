<?php

class Validator
{
    static function md5WithSalt($pass, $salt = "someDefaultSalt"): string
    {
        $hash = $salt;
        $hash .= md5($salt.$pass);
        return $hash;
    }

    function validateLogin($login): bool
    {
        if(strlen($login)>=6){
            return true;
        }
        return false;
    }
    function validatePassword($password): bool
    {
        $symbols = "@#№;$%^:?&*()-_+=!,.?/ `~";
        $chars = str_split($symbols);
        for ($i=0; $i<strlen($symbols); $i++) {
            if(strpos($password,$chars[$i])){
                return false;
            }
        }
        if(strlen($password)>=6){
            return true;
        }
        return false;
    }
    function validatePasswordConfirmation($password,$password_confirm): bool
    {
        if($password===$password_confirm ){
            return true;
        }
        return false;
    }
    function validateEmail($email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
    function validateName($name): bool
    {

        $symbols = "@#№;$%^:?&*()-_+=!,.?/ `~1234567890";
        $chars = str_split($symbols);
        for ($i=0; $i<strlen($symbols); $i++) {
            if(strpos($name,$chars[$i])){
                return false;
            }
        }
        if(strlen($name)>=2){
            return true;
        }
        return false;
    }
}