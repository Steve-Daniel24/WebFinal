<?php
// This is the bootstrap file responsible for initializing services, plugins, and connections.
$ds = DIRECTORY_SEPARATOR;
$autoloadPath = __DIR__ . $ds . '..' . $ds . '..' . $ds . 'vendor' . $ds . 'autoload.php';
require($autoloadPath);

// Ensure the config file exists before proceeding.
if (!file_exists(__DIR__ . '/config.php')) {
    throw new Exception('Config file not found. Please create a config.php file in the app/config directory.');
}

// use Dotenv\Dotenv;

// // Load environment variables from .env file.
// $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
// $dotenv->load();

// Démarrer la session
session_start();

// Create the Flight application instance.
$app = new \Flight\Engine();

// Load configuration file.
$config = require('config.php');

// Set up the router.
$router = $app->router();

// Load routes configuration.
require('routes.php');
// Load services configuration.
require('services.php');

// Start processing the app.
$app->start();
