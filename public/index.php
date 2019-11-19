<?php
session_start();
require_once '../src/WebApp.php';



$webApp = new WebApp();
$webApp->run();


