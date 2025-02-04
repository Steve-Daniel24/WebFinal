<?php

<<<<<<< HEAD
=======
use Flight\Engine;
use Flight\Router;
>>>>>>> ecf1f08d966abcb725daab86b8fc862c0cf892b2
use app\controllers\UserController;
use app\controllers\AnimalController;
use app\controllers\ShopController;
use app\controllers\AuthController;

/** 
 * @var Router $router 
 * @var Engine $app
 */

<<<<<<< HEAD
$animalController = new AnimalController();
Flight::route('GET /Animals', [$animalController, 'animals']);
Flight::route('POST /Animals/ajouter', [$animalController, 'addAnimal']);
Flight::route('GET /Animals/ajouterForm', [$animalController, 'formulaireAddAnimal']);
Flight::route('GET /Animals/delete/@id', [$animalController, 'deleteAnimal']);
Flight::route('GET /Animals/edit/@id', [$animalController, 'formulaireModifyAnimal']);
Flight::route('POST /Animals/update/@id', [$animalController, 'updateAnimal']);

Flight::route('GET /EtatElevage', [$animalController, 'GainPoidsAnimale']);
Flight::route('POST /Animals/gainPoids/', [$animalController, 'calculerGainPoidsTous']);
=======
// Initialisation des contrôleurs
$animalController = new AnimalController();
$userController = new UserController();
$shopController = new ShopController();
$authController = new AuthController();

// Route principale
Flight::route('/', function() {
    Flight::render('index');
});

// Routes pour la gestion des animaux
Flight::route('GET /Animals', [$animalController, 'animals']);
Flight::route('POST /Animals/ajouter', [$animalController, 'addAnimal']);
Flight::route('GET /Animals/ajouterForm', [$animalController, 'formulaireAddAnimal']);
Flight::route('GET /Animals/delete/@id', [$animalController, 'deleteAnimal']);
Flight::route('GET /Animals/edit/@id', [$animalController, 'formulaireModifyAnimal']);
Flight::route('POST /Animals/update/@id', [$animalController, 'updateAnimal']);
Flight::route('GET /EtatElevage', [$animalController, 'GainPoidsAnimale']);
Flight::route('POST /Animals/gainPoids/', [$animalController, 'calculerGainPoidsTous']);

// Routes pour la boutique d'animaux
Flight::route('GET /shop', [$shopController, 'index']);
Flight::route('GET /shop/animal/@id', [$shopController, 'viewAnimal']);
Flight::route('POST /shop/buy/@id', [$shopController, 'buyAnimal']);

// Routes pour la gestion des utilisateurs
Flight::route('GET /user/profile', [$userController, 'profile']);
Flight::route('POST /user/update', [$userController, 'updateProfile']);
Flight::route('GET /user/transactions', [$userController, 'transactionHistory']);

// Routes pour la gestion de l'argent
Flight::route('GET /depot-argent', [$userController, 'showDepotForm']);
Flight::route('POST /depot-argent', [$userController, 'processDepot']);
Flight::route('GET /solde', [$userController, 'checkBalance']);

// Routes pour l'API
Flight::route('GET /api/animals/count', [$animalController, 'getCount']);
Flight::route('GET /api/user/balance', [$userController, 'getBalance']);

// Routes pour l'authentification
Flight::route('GET /login', [$authController, 'showLoginForm']);
Flight::route('POST /login', [$authController, 'login']);
Flight::route('GET /register', [$authController, 'showRegisterForm']);
Flight::route('POST /register', [$authController, 'register']);
Flight::route('GET /logout', [$authController, 'logout']);

// Middleware pour vérifier l'authentification
Flight::before('start', function (&$params, &$output) {
    $publicRoutes = ['/', '/login', '/register', '/debug'];
    $currentPath = Flight::request()->url;

    if (!in_array($currentPath, $publicRoutes) && !isset($_SESSION['user'])) {
        Flight::redirect('/login');
        return false;
    }
});

// Route de debug
Flight::route('/debug', function() {
    echo "Views path: " . Flight::get('flight.views.path') . "<br>";
    echo "Current directory: " . __DIR__ . "<br>";
    echo "Base URL: " . Flight::get('flight.base_url') . "<br>";
});
>>>>>>> ecf1f08d966abcb725daab86b8fc862c0cf892b2
