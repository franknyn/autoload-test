<?php 
//if using from /index.php
//require_once __DIR__ . '/vendor/autoload.php'; 
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

/*
use Vehicle\Road\Car;
echo Car::hello();
*/

/*
use Vehicle\Road;
echo Road\Car::hello();
*/

echo \Book\History\UnitedStates::hello();

//Testing Autoloading Vendor Files. It should be mapped to: vendor/guzzlehttp/guzzle/src
$client = new GuzzleHttp\Client();
