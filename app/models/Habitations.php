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

    // Payments
    public function insertPayment($booking_id, $amount, $method_id) {
        $stmt = $this->db->prepare("INSERT INTO Payments (booking_id, amount, method_id) VALUES ($booking_id, $amount, $method_id)");
        $stmt->execute();
        return $this->db->lastInsertId();
    }
    
    public function getPaymentsByBookingId($booking_id) {
        $stmt = $this->db->prepare("SELECT * FROM Payments WHERE booking_id = $booking_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function deletePayment($id) {
        $stmt = $this->db->prepare("DELETE FROM Payments WHERE id = $id");
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function insertPaymentMethod($method_name) {
        $stmt = $this->db->prepare("INSERT INTO Payment_Methods (method_name) VALUES ('$method_name')");
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getPaymentMethods() {
        $stmt = $this->db->query("SELECT * FROM Payment_Methods");
        return $stmt->fetchAll();
    }

    public function updatePaymentMethod($id, $method_name) {
        $stmt = $this->db->prepare("UPDATE Payment_Methods SET method_name = '$method_name' WHERE id = $id");
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deletePaymentMethod($id) {
        $stmt = $this->db->prepare("DELETE FROM Payment_Methods WHERE id = $id");
        $stmt->execute();
        return $stmt->rowCount();
    }

      // Bookings
      public function insertBooking($property_id, $client_id, $start_date, $end_date, $total_amount, $status_id) {
        $stmt = $this->db->prepare("INSERT INTO Bookings (property_id, client_id, start_date, end_date, total_amount, status_id) VALUES ($property_id, $client_id, $start_date, '$end_date', $total_amount, $status_id)");
        $stmt->execute();
        return $stmt->rowCount(); // Return the number of affected rows
    }

    public function getBookingsByPropertyId($property_id) {
        $stmt = $this->db->prepare("SELECT * FROM Bookings WHERE property_id = $property_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getBookingsByClientId($client_id) {
        $stmt = $this->db->prepare("SELECT * FROM Bookings WHERE client_id = $client_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
        //Habitation_Types
        public function insertHabitation_Types($type_name){
            $stmt = $this->db->prepare("INSERT INTO Habitation_Types (type_name) VALUES ('$type_name)");
            $stmt->execute();
            return $stmt->rowCount(); // Return the number of affected rows
        }
        
        public function getAllHabitation_Types() {
            $stmt = $this->db->query("SELECT * FROM Habitation_Types");
            return $stmt->fetchAll();
            }
        public function getHabitation_TypesNameById($id){
            $stmt = $this->db->prepare("SELECT * FROM Habitation_Types WHERE id =$id");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        //Locations 
        public function insertLocations($neighborhood_name){
            $stmt = $this->db->prepare("INSERT INTO Locations (neighborhood_name) VALUES ('$neighborhood_name)");
            $stmt->execute();
            return $stmt->rowCount(); // Return the number of affected rows
        }
        public function getAllLocations() {
            $stmt = $this->db->query("SELECT * FROM Locations");
            return $stmt->fetchAll();
            }
            public function getLocationsNameById($id){
                $stmt = $this->db->prepare("SELECT * FROM Locations WHERE id =$id");
                $stmt->execute();
                return $stmt->fetchAll();
            }

            //Availability
            public function insertAvailability($neighborhood_name){
                $stmt = $this->db->prepare("INSERT INTO Availability (neighborhood_name) VALUES ('$neighborhood_name)");
                $stmt->execute();
                return $stmt->rowCount(); // Return the number of affected rows
            }

            public function getAllAvailability() {
                $stmt = $this->db->query("SELECT * FROM Availability");
                return $stmt->fetchAll();
                }
                public function getAvailabilityNameById($id){
                    $stmt = $this->db->prepare("SELECT * FROM Availability WHERE id =$id");
                    $stmt->execute();
                    return $stmt->fetchAll();
                }
                public function deleteAvailability($id) {
                    $stmt = $this->db->prepare("DELETE FROM Availability WHERE id = $id");
                    $stmt->execute();
                    return $stmt->rowCount();
                }
                public function updateAvailability($id, $neighborhood_name) {
                    $stmt = $this->db->prepare("UPDATE Availability SET neighborhood_name = '$neighborhood_name' WHERE id = $id");
                    $stmt->execute();
                    return $stmt->rowCount();
                }
                
    // Status Availability
    public function insertStatusAvailability($status_name) {
        $stmt = $this->db->prepare("INSERT INTO Status_Availability (status_name) VALUES ('$status_name')");
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getStatusAvailability() {
        $stmt = $this->db->query("SELECT * FROM Status_Availability");
        return $stmt->fetchAll();
    }

    public function updateStatusAvailability($id, $status_name) {
        $stmt = $this->db->prepare("UPDATE Status_Availability SET status_name = '$status_name' WHERE id = $id");
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteStatusAvailability($id) {
        $stmt = $this->db->prepare("DELETE FROM Status_Availability WHERE id = $id");
        $stmt->execute();
        return $stmt->rowCount();
    }

            
        //propirete
        public function getAllProperties() {
            $stmt = $this->db->query("SELECT * FROM Properties");
            return $stmt->fetchAll();
            }
        public function insert_propirete($type,$num_rooms,$daily_rent,$location,$description) {
            $stmt = $this->db->prepare("INSERT INTO Properties (type_id,num_rooms,daily_rent,location_id,description) VALUES ($type,$num_rooms,$daily_rent,'$location','$description')");
            $stmt->execute();
            return $this->db->lastInsertId();
        }
        public function getPropertiesById($id) {
            $stmt = $this->db->prepare("SELECT * FROM Properties  WHERE id = $id");
            $stmt->execute();
            return $stmt->fetchColumn(); // Return the user ID
        }
        public function search($type,$num_rooms,$daily_rent,$location) {
            $sql="SELECT * FROM Properties  WHERE";
            if($type != null){
                $sql+=" AND type = '$type'";
            }
            if($num_rooms!= null){
                $sql+=" AND num_rooms = $num_rooms";
            }
            if($daily_rent!= null){
                $sql+=" AND daily_rent = $daily_rent";
            }
            if($location= null){
                $sql+=" AND location_id = ,$location";
            }

            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); 
        }

        //photo
        public function insertPhoto($property_id, $photo_url) {
            $stmt = $this->db->prepare("INSERT INTO Photos (property_id, photo_url) VALUES ($property_id, '$photo_url')");
            $stmt->execute();
            return $stmt->rowCount();
        }
        
        public function getPhotosByHabitationId($property_id) {
            $stmt = $this->db->prepare("SELECT * FROM Photos WHERE property_id =$property_id");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function getAllPhoto() {
            $stmt = $this->db->prepare("SELECT * FROM Photos");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        
            // Favorites
    public function insertFavorite($client_id, $property_id) {
        $stmt = $this->db->prepare("INSERT INTO Favorites (client_id, property_id) VALUES ($client_id, $property_id)");
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getFavoritesByClientId($client_id) {
        $stmt = $this->db->prepare("SELECT * FROM Favorites WHERE client_id = $client_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateFavorite($id, $client_id, $property_id) {
        $stmt = $this->db->prepare("UPDATE Favorites SET client_id = $client_id, property_id = $property_id WHERE id = $id");
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteFavorite($id) {
        $stmt = $this->db->prepare("DELETE FROM Favorites WHERE id = $id");
        $stmt->execute();
        return $stmt->rowCount();
    }



}