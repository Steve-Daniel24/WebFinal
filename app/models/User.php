<?php

namespace app\models;

use Flight;
use PDO;

class User
{
    private $db;
    private $id;
    private $nom;
    private $email;
    private $capital_initial;
    private $capital_actuel;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Méthode statique pour récupérer un utilisateur par son ID
    public static function getById($id)
    {
        $db = Flight::db();
        $stmt = $db->prepare("SELECT * FROM utilisateur WHERE id = ?");
        $stmt->execute([$id]);
        $userData = $stmt->fetch(PDO::FETCH_OBJ);

        if ($userData) {
            $user = new self($db);
            $user->id = $userData->id;
            $user->nom = $userData->nom;
            $user->email = $userData->email;
            $user->capital_initial = $userData->capital_initial;
            $user->capital_actuel = $userData->capital_actuel;
            return $user;
        }

        return null;
    }

    // Méthode pour déduire le solde
    public function deductBalance($amount)
    {
        if (!$this->id) {
            return false;
        }

        $db = Flight::db();
        $stmt = $db->prepare("UPDATE utilisateur SET capital_actuel = capital_actuel - ? WHERE id = ?");
        return $stmt->execute([$amount, $this->id]);
    }

    // Méthode d'authentification
    public static function authenticate($email, $password)
    {
        $db = Flight::db();
        $stmt = $db->prepare("SELECT * FROM utilisateur WHERE email = ? AND password = ?");
        $stmt->execute([$email, md5($password)]); // Note: md5 n'est pas sécurisé, utilisez password_hash en production
        $userData = $stmt->fetch(PDO::FETCH_OBJ);

        if ($userData) {
            $user = new self($db);
            $user->id = $userData->id;
            $user->nom = $userData->nom;
            $user->email = $userData->email;
            $user->capital_initial = $userData->capital_initial;
            $user->capital_actuel = $userData->capital_actuel;
            return $user;
        }

        return null;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCapitalInitial()
    {
        return $this->capital_initial;
    }

    public function getCapitalActuel()
    {
        return $this->capital_actuel;
    }

    // Méthode de création d'utilisateur
    public static function create($data)
    {
        $db = Flight::db();
        $stmt = $db->prepare("
            INSERT INTO utilisateur (nom, email, password, capital_initial, capital_actuel) 
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['nom'],
            $data['email'],
            md5($data['password']), // Note: md5 n'est pas sécurisé, utilisez password_hash en production
            $data['capital_initial'],
            $data['capital_initial'] // Le capital actuel est égal au capital initial à la création
        ]);
    }

    // Méthodes existantes
    public function createUser($nom, $capital_initial, $capital_actuel)
    {
        $sql = "INSERT INTO utilisateur (nom, capital_initial, capital_actuel) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nom, $capital_initial, $capital_actuel]);
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM utilisateur";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateUser($id, $nom, $capital_initial, $capital_actuel)
    {
        $sql = "UPDATE utilisateur SET nom = ?, capital_initial = ?, capital_actuel = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nom, $capital_initial, $capital_actuel, $id]);
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM utilisateur WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    // Mise à jour du capital actuel
    public function updateCapitalActuel($id, $capital_actuel)
    {
        $sql = "UPDATE utilisateur SET capital_actuel = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$capital_actuel, $id]);
    }
}
