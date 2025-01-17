<?php

namespace app\controllers;
use app\models\Users;
use Flight;
class UserController {

    public function __construct() {

	}
   

    public function login() {
      //  $benefits = Trip::getDailyBenefits();
        Flight::render('login');
       
    }
    public function log() {
        $Users = new Users(Flight::db());
        $User = $Users->isUser($_POST['email'],$_POST['password']);
        $name=   $Users->getUserNameByEmail($_POST['email']);
        if ($User) {
            session_start();
            $_SESSION['email'] = $_POST['email']; 
            $_SESSION['username'] = $name;
            Flight::render('home', ['username' =>$_SESSION['username']]);
        }else{
            $error="invalid username or password";
            $data=['error'=>$error];
            Flight::render('login',$data);
        }
    }

    public function signup() {
        Flight::render('register');
    }

    public function deposit() {
        Flight::render('deposit');
    }

    public function register() {
        $Users = new Users(Flight::db());
        $User = $Users->insert_User($_POST['username'],$_POST['password'],$_POST['email'],$_POST['tel']);
        if ($User != 0) {
            Flight::redirect('/');
        }else{
        $error="error while registering";
        $data=['error'=>$error];
        Flight::render('register',$data);
        }
    }

 


    
}

?>