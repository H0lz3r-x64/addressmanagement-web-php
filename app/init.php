<?php
// Configuration file to define constants, API endpoints, or any other configuration settings.

// Composer autoloader
require '../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(dirname(APP_ROOT_PATH));
$dotenv->load();

// Establish database connection
require_once 'database.php';

// Load core classes
require_once 'core/App.php';
require_once 'core/HelpFunctions.php';
require_once 'core/Controller.php';
require_once 'core/DevOpsApiService.php';

