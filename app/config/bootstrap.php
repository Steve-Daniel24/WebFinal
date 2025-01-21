<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;

// Charge les variables d'environnement
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

// Vérifie la présence de config.php
$ds = DIRECTORY_SEPARATOR;
if (!file_exists(__DIR__ . $ds . 'config.php')) {
    Flight::halt(500, 'Config file not found. Please create a config.php file in the app/config directory to get started.');
}

// Charge les services
$app = Flight::app();
$config = require 'config.php';
$router = $app->router();
require 'routes.php';
require 'services.php';

// Démarre l'application
$app->start();
