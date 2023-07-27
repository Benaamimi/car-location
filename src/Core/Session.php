<?php

namespace App\Core;

class Session
{
    static public function setFlashMessage($message){
        $_SESSION['message'] = $message;
    }

    static public function getFlashMessage(){
        if(isset($_SESSION['message'])){
            echo $_SESSION ['message'];
            unset($_SESSION ['message']);
        }
    }
}