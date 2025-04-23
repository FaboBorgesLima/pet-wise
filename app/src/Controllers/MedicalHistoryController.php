<?php

namespace App\Controllers;

use App\Models\MedicalHistory;
use App\Models\Request;

use App\Views\Show;
use App\Views\ShowAll;

class MedicalHistoryController
{
    public static function showAll(Request $req)
    {
        $all = MedicalHistory::all();
        ShowAll::render($all);
    }
    public static function show(Request $req)
    {
        if (array_key_exists("id", $req->get)) {
            $medical_history = MedicalHistory::byId((int)$req->get["id"]);
            Show::render($medical_history);
            return;
        }

        Show::render();
    }
    public static function delete(Request $req)
    {
        if (array_key_exists("id", $req->post)) {
            $medical_history = MedicalHistory::byId((int)$req->post["id"]);
            if ($medical_history)
                $medical_history->delete();
            header("Location: /");
            return;
        }

        header("Location: /");
    }

    public static function update(Request $req)
    {

        if (
            !(array_key_exists("id", $req->post) &&
                array_key_exists("pet_name", $req->post) &&
                array_key_exists("appointment_date", $req->post) &&
                array_key_exists("medications", $req->post) &&
                array_key_exists("notes", $req->post)
            )
        ) {
            header("Location: /");
            return;
        }

        $medical_history = MedicalHistory::byId($req->post["id"]);

        $medical_history->notes = $req->post["notes"];
        $medical_history->pet_name = $req->post["pet_name"];
        $medical_history->medications = $req->post["medications"];
        $medical_history->appointment_date = strtotime($req->post["appointment_date"]);

        $medical_history->save();

        header("Location: /");
    }

    public static function create(Request $req)
    {
        if (
            !(
                array_key_exists("pet_name", $req->post) &&
                array_key_exists("appointment_date", $req->post) &&
                array_key_exists("medications", $req->post) &&
                array_key_exists("notes", $req->post)
            )
        ) {
            header("Location: /");
            return;
        }


        MedicalHistory::create($req->post["pet_name"], $req->post["notes"], $req->post["medications"], strtotime($req->post["appointment_date"]));

        header("Location: /");
    }
}
