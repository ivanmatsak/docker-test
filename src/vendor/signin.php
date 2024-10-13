<?php
    session_start();
    include_once "JsonConnector.php";
    $jsonConnector= new JsonConnector();
    $login= $_POST['login'];
    $password=$_POST['password'];
    $checkUser = $jsonConnector->findUser($login,Validator::md5WithSalt($password,"SomeSalt"));
    if($checkUser){
        setcookie("login",$login,0,'/');
        setcookie("authorized",true);
        $_SESSION['authorization_message']='Welcome! '.$_POST['login'];
        header('Location: list.php');
    }else{
        $_SESSION['authorization_message']='There are no such users';
        header('Location: ../index.php');
    }