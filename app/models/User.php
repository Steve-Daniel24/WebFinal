<?php

namespace app\models;

use Flight;

class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createUser($nom, $capital_initial, $capital_actuel) {
        $sql = "INSERT INTO utilisateur (nom, capital_initial, capital_actuel) VALUES ($nom, $capital_initial, $capital_actuel)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function getUser($id) {
        $sql = "SELECT * FROM utilisateur WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getAllUsers() {
        $sql = "SELECT * FROM utilisateur";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
    public function updateUser($id, $nom, $capital_initial, $capital_actuel) {
        $sql = "UPDATE utilisateur SET nom = $nom, capital_initial = $capital_initial, capital_actuel = $capital_actuel WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute();
    }
    public function deleteUser($id) {
        $sql = "DELETE FROM utilisateur WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute();
    }

    // update capital actuel
    public function updateCapitalActuel($id, $capital_actuel) {
        $sql = "UPDATE utilisateur SET capital_actuel = $capital_actuel WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute();
    }

}
