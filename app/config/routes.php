<?php
use app\controllers\UserController;
use app\controllers\HabitationController;
use flight\net\Router;
/** 
 * @var Router $router 
 * @var Engine $app
 */
$UserController = new UserController();
$HabitationController = new HabitationController();
$router->get('/', [ $UserController, 'login' ]);
$router->post('/loging', [ $UserController, 'log' ]);
$router->post('/register', [ $UserController, 'register' ]);
$router->get('/signup', [ $UserController, 'signup' ]);
$router->get('/Admin', [ $HabitationController, 'Admin' ]);
$router->post('/AddHabitation', [ $HabitationController, 'AddHabitation' ]);





// Flight::route('GET /vehicles/available/@date', ['VehicleController', 'showAvailableVehicles']);
// Flight::route('GET /vehicles/benefits', ['VehicleController', 'showBenefitPerVehicle']);
// Flight::route('GET /trips/daily_benefits', ['TripController', 'showDailyBenefits']);
// Flight::route('GET /trips/profitable/@date', ['TripController', 'showMostProfitableTrips']);
// Flight::route('/', ['TripController', 'hello'])

?>