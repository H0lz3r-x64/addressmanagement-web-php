<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => env('DB_HOST', 'localhost'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', 'root'),
    'database' => env('DB_DATABASE', 'database'),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);

$capsule->bootEloquent();



