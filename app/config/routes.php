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
 Flight::route('GET /Admin_Animal', [$animalController, 'animal_shop']);
 Flight::route('POST /add_animal_shop', [$animalController, 'animalshop_insert']);
 Flight::route('POST /Animalshop_delete', [$animalController, 'Animalshop_delete']);
 Flight::route('GET /Animalshop_buy', [$animalController, 'buy_animals_redirect']);
 Flight::route('POST /buy_animal', [$animalController, 'buy_animal']);

?>