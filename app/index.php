<?php

require 'vendor/autoload.php';


use App\Controllers\MedicalHistoryController;
use App\Models\Router;


Router::get("/", MedicalHistoryController::class, "get");

Router::run();
