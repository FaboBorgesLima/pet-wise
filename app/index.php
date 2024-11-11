<?php

require 'vendor/autoload.php';

use App\Controllers\MedicalHistoryController;
use App\Models\Router;


Router::get("/", MedicalHistoryController::class, "showAll");
Router::get("/medical-history", MedicalHistoryController::class, "show");
Router::post("/medical-history/update", MedicalHistoryController::class, "update");
Router::post("/medical-history", MedicalHistoryController::class, "create");
Router::post("/medical-history/delete", MedicalHistoryController::class, "delete");

Router::run();
