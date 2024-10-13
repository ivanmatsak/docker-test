<?php
    session_start();
    include_once "Validator.php";
    include_once "JsonConnector.php";
    function fileCreateWrite(){

        $validator = new Validator();
        $jsonConnector = new JsonConnector();

        if(!$validator->validateLogin($_POST["login"])){
            $_SESSION['login_error_message'] = 'Invalid login';
            header('Location: ../register.php');
        } if(!$validator->validatePassword($_POST["password"])){
            $_SESSION['password_error_message'] = 'Invalid password';
            header('Location: ../register.php');
        }
        if(!$validator->validatePasswordConfirmation($_POST["password"],$_POST["password_confirm"])){
            $_SESSION['password_confirm_error_message'] = 'Passwords do not match';
            header('Location: ../register.php');
        }
        if(!$validator->validateEmail($_POST["email"])){
            $_SESSION['email_error_message'] = 'Invalid email';
            header('Location: ../register.php');
        }
        if(!$validator->validateName($_POST["name"])){
            $_SESSION['name_error_message'] = 'Invalid name';
            header('Location: ../register.php');
        } if(!$jsonConnector->isThisLoginUnique($_POST['login'])){
            $_SESSION['login_not_unique_message'] = 'There is already a user with this login!';
            header('Location: ../register.php');
        }else
        if(!$jsonConnector->isThisEmailUnique($_POST['email'])){
            $_SESSION['email_not_unique_message'] = 'There is already a user with this email!';
            header('Location: ../register.php');

        }else{
            $_SESSION['message'] = 'You have successfully registered';

            $jsonConnector->fileCreateWrite($_POST["login"],$_POST["password"],$_POST["password_confirm"],$_POST["email"],$_POST["name"]);

            header('Location: ../index.php');
        }
    }
    fileCreateWrite();
