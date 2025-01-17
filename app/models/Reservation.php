<?php
namespace app\models;

use Flight;

use function PHPSTORM_META\type;

class Reservation {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

public function insertReservation($habitation_id, $user_id, $start_date, $end_date, $total_amount, $status) {
    $stmt = $this->db->prepare("INSERT INTO reservations (habitation_id, user_id, start_date, end_date, total_amount, status) VALUES ($habitation_id, $user_id, '$start_date', '$end_date', $total_amount, '$status')");
    $stmt->execute();
    return $this->db->rowCount();
}

public function getReservationsByHabitationId($habitation_id) {
    $stmt = $this->db->prepare("SELECT * FROM reservations WHERE habitation_id = '$habitation_id'");
    $stmt->execute();
    return $stmt->fetchAll();
}

public function getReservationsByUserId($user_id) {
    $stmt = $this->db->prepare("SELECT * FROM reservations WHERE user_id = '$user_id'");
    $stmt->execute();
    return $stmt->fetchAll();
}
public function getAll() {
    $stmt = $this->db->query("SELECT * FROM reservations");
    return $stmt->fetchAll();
    }
        

        
           


}