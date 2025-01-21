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
        // Test de connexion avant de continuer
        try {
            $db = Flight::db();
            if (!$db) {
                throw new \Exception("Erreur de connexion à la base de données."); // Utilisation de \Exception pour indiquer la classe native
            }
            echo "Connexion réussie à la base de données."; // Affiche juste pour tester
        } catch (\Exception $e) { // Même ici, utiliser \Exception
            echo "Erreur : " . $e->getMessage();
            return; // Arrêter ici si la connexion échoue
        }

        // Vérifier les données envoyées par le formulaire
        if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['email']) || !isset($_POST['tel'])) {
            $error = "Missing required fields.";
            $data = ['error' => $error];
            Flight::render('register', $data);
            return;
        }
    
        // Vérification que les données sont valides
        $username = isset($_POST['username']) && is_string($_POST['username']) ? trim($_POST['username']) : null;
        $password = isset($_POST['password']) && is_string($_POST['password']) ? trim($_POST['password']) : null;
        $email = isset($_POST['email']) && is_string($_POST['email']) ? trim($_POST['email']) : null;
        $tel = isset($_POST['tel']) && is_string($_POST['tel']) ? trim($_POST['tel']) : null;
    
        // Vérifier la connexion à la base de données
        $db = Flight::db();
        if (!$db) {
            $error = "Database connection failed.";
            $data = ['error' => $error];
            Flight::render('register', $data);
            return;
        }
    
        // Appeler la méthode d'insertion avec les valeurs vérifiées
        $Users = new Users($db);
        $User = $Users->insert_User($username, $password, $email, $tel);
    
        if ($User != 0) {
            Flight::redirect('/');
        } else {
            $error = "Error while registering.";
            $data = ['error' => $error];
            Flight::render('register', $data);
        }
    }
    
    
    

 


    
}

