<?php

namespace app\controllers;
use app\models\Habitations;
use Flight;
class HabitationController {

    public function __construct() {

	}

    
    public function Admin() {
        $habitations = new Habitations(Flight::db());
        //  $benefits = Trip::getDailyBenefits();
        $photo= $habitations->getAllPhoto();
        $properties = $habitations->getAllProperties();
          Flight::render('admin/properties',['properties' => $properties,'photo' => $photo]);
         
      }
      public function redirecthome(){
        
        Flight::render('home');
      }
   

    // insertion des prprieter
public function AddHabitation(){

    $habitations = new Habitations(Flight::db());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $num_rooms = $_POST['num_rooms'];
    $daily_rent = $_POST['daily_rent'];
    $location = $_POST['location'];
    $description = $_POST['description'];


    // Handle file upload
    $target_dir = "../public/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["photo"]["name"])). " has been uploaded.";
            $photo_url = $target_file;

            // Insert property and photo URL into the database
            $property_id = $habitations->insert_propirete($type, $num_rooms, $daily_rent, $location, $description);
            if ($property_id) {
                $habitations->insertPhoto($property_id, $photo_url);
                echo "Property inserted successfully with ID: " . $property_id;
            } else {
                echo "Failed to insert property.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

    
}
}
           