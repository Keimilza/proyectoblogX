<?php

ini_set('max_execution_time',0); //esto es para que el servidor web se mantenga arriba (el localhost:5000)
require_once  dirname(__DIR__).'/vendor/autoload.php';
use App\kernel;

session_start();
$kernel = new kernel();
$kernel->init();