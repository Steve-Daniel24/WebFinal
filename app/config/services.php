<?php

use flight\Engine;
use flight\database\PdoWrapper;
use flight\debug\database\PdoQueryCapture;
use Tracy\Debugger;
use app\models\AnimalModel;
use app\models\AlimentationModel;
use app\models\User;

/** 
 * @var array $config This comes from the returned array at the bottom of the config.php file
 * @var Engine $app
 */

// uncomment the following line for MySQL
$dsn = 'mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['dbname'] . ';charset=utf8mb4';

// uncomment the following line for SQLite
// $dsn = 'sqlite:' . $config['database']['file_path'];

// Uncomment the below lines if you want to add a Flight::db() service
// In development, you'll want the class that captures the queries for you. In production, not so much.
$pdoClass = Debugger::$showBar === true ? PdoQueryCapture::class : PdoWrapper::class;
$app->register('db', $pdoClass, [$dsn, $config['database']['user'] ?? null, $config['database']['password'] ?? null]);

// Got google oauth stuff? You could register that here
// $app->register('google_oauth', Google_Client::class, [ $config['google_oauth'] ]);

// Redis? This is where you'd set that up
// $app->register('redis', Redis::class, [ $config['redis']['host'], $config['redis']['port'] ]);


Flight::map('AnimalModel', function() {
    return new AnimalModel(Flight::db());
});

<<<<<<< HEAD
Flight::map('AlimentationlModel', function () {
    return new AlimentationModel(Flight::db());
});

Flight::map('User', function () {
=======
Flight::map('AlimentationModel', function() {
    return new AlimentationModel(Flight::db());
});

Flight::map('User', function() {
>>>>>>> ecf1f08d966abcb725daab86b8fc862c0cf892b2
    return new User(Flight::db());
});

// Pour le debugger
$pdoClass = class_exists('Tracy\Debugger') ? 'PdoQueryCapture' : 'PDO';
$app->register('db', $pdoClass, [$config['database']['user'], $config['database']['password'] ?? null]);
