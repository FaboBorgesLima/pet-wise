<?php

namespace App\Controllers;

use App\Models\MedicalHistory;
use App\Models\Request;

class MedicalHistoryController
{
    static function get(Request $req)
    {
        var_dump(MedicalHistory::all());
    }
}
