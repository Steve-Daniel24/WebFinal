<?php
namespace app\models;

use Flight;
class Users {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function isUser($email,$password) {
        $stmt = $this->db->query("SELECT * FROM User where email = '$email' AND mot_de_passe = '$password'");
        return $stmt->fetchAll();
        }

        public function insert_User($name, $password,$email,$tel) {
            $stmt = $this->db->prepare("INSERT INTO User (nom, mot_de_passe,email,tel) VALUES ('$name', '$password','$email','$tel')");
            $stmt->execute();
            return $stmt->rowCount(); // Return the number of affected rows
        }

        public function getUserIdByEmail($email) {
            $stmt = $this->db->prepare("SELECT id FROM  WHERE email = '$email'");
            $stmt->execute();
            return $stmt->fetchColumn(); // Return the user ID
        }
        public function getUserNameByEmail($email) {
            $stmt = $this->db->prepare("SELECT nom FROM  WHERE email = '$email'");
            $stmt->execute();
            return $stmt->fetchColumn(); // Return the user ID
        }

        
           


}