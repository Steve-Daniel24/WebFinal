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
        $stmt = $this->db->query("SELECT * FROM Clients where email = '$email' AND password = '$password'");
        return $stmt->fetchAll();
        }

        public function insert_User($name, $password,$email,$tel) {
            $stmt = $this->db->prepare("INSERT INTO Clients (name,password,email,phone) VALUES ('$name', '$password','$email','$tel')");
            $stmt->execute();
            return $stmt->rowCount(); // Return the number of affected rows
        }

        public function getUserIdByEmail($email) {
            $stmt = $this->db->prepare("SELECT id FROM Clients  WHERE email = '$email'");
            $stmt->execute();
            return $stmt->fetchColumn(); // Return the user ID
        }
        public function getUserNameByEmail($email) {
            $stmt = $this->db->prepare("SELECT name FROM Clients  WHERE email = '$email'");
            $stmt->execute();
            return $stmt->fetchColumn(); // Return the user ID
        }

        
           


}