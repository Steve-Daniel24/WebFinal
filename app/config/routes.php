<?php
use app\controllers\UserController;
use flight\net\Router;
/** 
 * @var Router $router 
 * @var Engine $app
 */
$UserController = new UserController();
$router->get('/', [ $UserController, 'login' ]);
$router->post('/loging', [ $UserController, 'log' ]);
$router->post('/register', [ $UserController, 'register' ]);
$router->get('/signup', [ $UserController, 'signup' ]);




// Flight::route('GET /vehicles/available/@date', ['VehicleController', 'showAvailableVehicles']);
// Flight::route('GET /vehicles/benefits', ['VehicleController', 'showBenefitPerVehicle']);
// Flight::route('GET /trips/daily_benefits', ['TripController', 'showDailyBenefits']);
// Flight::route('GET /trips/profitable/@date', ['TripController', 'showMostProfitableTrips']);
// Flight::route('/', ['TripController', 'hello'])

?>