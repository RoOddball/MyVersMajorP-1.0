
<?php

//require_once __DIR__ . '/../vendor/autoload.php';
//require_once __DIR__ . '/../config/DatabaseConfig.php';
session_start();
require_once '../src/WebApp.php';



$webApp = new WebApp();
$webApp->run();


