<?php
namespace frontend;

// Define a constant to store the root path of the app
define('APP_ROOT_PATH', dirname(__DIR__) . "/app");
// Define a constant to store the root path of the public folder
define('PUBLIC_ROOT_PATH', dirname(__DIR__) . "/public");

require_once APP_ROOT_PATH . '/init.php';

$app = new \Backend\Core\App();

