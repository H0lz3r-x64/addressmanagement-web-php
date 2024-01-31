<?php
namespace frontend;

// Define a constant for the views directory
define('APP_ROOT_PATH', dirname(__DIR__) . "/app");

require_once APP_ROOT_PATH . '/init.php';

$app = new \Backend\Core\App();

