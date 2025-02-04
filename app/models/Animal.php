<?php

namespace app\models;

use Flight;
use PDO;

class Animal {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public static function getAllForSale() {
        $db = Flight::db();
        $stmt = $db->query("SELECT * FROM animal WHERE status = 'for_sale'");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $db = Flight::db();
        $stmt = $db->prepare("SELECT * FROM animal WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function purchase($animalId, $userId) {
        $db = Flight::db();
        $stmt = $db->prepare("UPDATE animal SET user_id = ?, status = 'sold' WHERE id = ?");
        return $stmt->execute([$userId, $animalId]);
    }
} 