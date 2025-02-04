<?php
use app\controllers\UserController;
use flight\net\Router;
use app\controllers\AnimalController;

/** 
 * @var Router $router 
 * @var Engine $app
 */

 $animalController = new AnimalController();
 Flight::route('GET /Animals', [$animalController, 'animals']);
 Flight::route('POST /Animals/ajouter', [$animalController, 'addAnimal']);
 Flight::route('GET /Animals/ajouterForm', [$animalController, 'formulaireAddAnimal']);
 Flight::route('GET /Animals/delete/@id', [$animalController, 'deleteAnimal']);
 Flight::route('GET /Animals/edit/@id', [$animalController, 'formulaireModifyAnimal']);
 Flight::route('POST /Animals/update/@id', [$animalController, 'updateAnimal']);
 
 Flight::route('GET /EtatElevage', [$animalController, 'GainPoidsAnimale']);
 Flight::route('POST /Animals/gainPoids/', [$animalController, 'calculerGainPoidsTous']);
 

?>