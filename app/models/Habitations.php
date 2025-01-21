<?php
namespace app\models;

use Flight;

use function PHPSTORM_META\type;

class Habitations {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM habitations");
        return $stmt->fetchAll();
        }

        public function insert_habitations($type,$num_rooms,$daily_rent,$neighborhood,$description) {
            $stmt = $this->db->prepare("INSERT INTO habitations (type, num_rooms,daily_rent,neighborhood,description) VALUES ('$type',$num_rooms,$daily_rent,'$neighborhood','$description')");
            $stmt->execute();
            return $stmt->rowCount(); // Return the number of affected rows
        }

        public function getHabitationsById($id) {
            $stmt = $this->db->prepare("SELECT * FROM habitations  WHERE id = $id");
            $stmt->execute();
            return $stmt->fetchColumn(); // Return the user ID
        }
        public function search($type,$num_rooms,$daily_rent,$neighborhood) {
            $sql="SELECT * FROM habitations  WHERE";
            if($type != null){
                $sql+=" AND type = '$type'";
            }
            if($num_rooms!= null){
                $sql+=" AND num_rooms = $num_rooms";
            }
            if($daily_rent!= null){
                $sql+=" AND daily_rent = $daily_rent";
            }
            if($neighborhood!= null){
                $sql+=" AND neighborhood = '$neighborhood'";
            }

            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); 
        }

        public function insertPhoto($habitation_id, $photo_url) {
            $stmt = $this->db->prepare("INSERT INTO photos (habitation_id, photo_url) VALUES ($habitation_id, '$photo_url')");
            $stmt->execute();
            return $stmt->rowCount();
        }
        
        public function getPhotosByHabitationId($habitation_id) {
            $stmt = $this->db->prepare("SELECT * FROM photos WHERE habitation_id =$habitation_id");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        

        
           


}