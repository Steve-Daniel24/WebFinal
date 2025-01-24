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

         // Admins
    public function insertAdmin($name, $password) {
        $stmt = $this->db->prepare("INSERT INTO Admins (name, password) VALUES ('$name', '$password')");
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getAdmins() {
        $stmt = $this->db->query("SELECT * FROM Admins");
        return $stmt->fetchAll();
    }

    public function updateAdmin($id, $name, $password) {
        $stmt = $this->db->prepare("UPDATE Admins SET name = '$name', password = '$password' WHERE id = $id");
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteAdmin($id) {
        $stmt = $this->db->prepare("DELETE FROM Admins WHERE id = $id");
        $stmt->execute();
        return $stmt->rowCount();
    }
           


}