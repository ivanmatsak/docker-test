<?php
include_once "Validator.php";


class JsonConnector
{
    public string $filename;
    function __construct($filename='users.json')
    {
        $this->filename = $filename;
    }



    function fileCreateWrite($login,$password,$passwordConfirm,$email,$name){
        $file = file_get_contents($this->filename);
        $taskList = json_decode($file,TRUE);

        unset($file);

        $taskList[] = array(
            'login'    =>             $_POST["login"],
            'password' =>             Validator::md5WithSalt($_POST["password"],"SomeSalt"),
            'email'    =>             $_POST["email"],
            'name'     =>             $_POST["name"]
        );

        file_put_contents('users.json',json_encode($taskList));

        unset($taskList);
    }

    function fileDelete($id){
        $file = file_get_contents($this->filename);

        $taskList=json_decode($file,TRUE);

        $key = array_search($id,array_column($taskList,''));

        unset($taskList[$key]);

        file_put_contents($this->filename,json_encode($taskList));

    }

    function findUser($login,$password){
        $file = file_get_contents($this->filename);

        $array=json_decode($file,TRUE);

        foreach ($array as $element){
            if($element['login']==$login && $element['password']==$password){
                return true;
            }
        }

        return false;
    }

    function isThisLoginUnique($login){
        $file = file_get_contents($this->filename);

        $array=json_decode($file,TRUE);

        foreach ($array as $element){
            if(strcmp($element['login'],$login)==0){
                return false;
            }
        }

        return true;
    }
    function isThisEmailUnique($email){
        $file = file_get_contents($this->filename);

        $array=json_decode($file,TRUE);

        foreach ($array as $element){
            if($element['email']==$email){
                return false;
            }
        }

        return true;
    }
}