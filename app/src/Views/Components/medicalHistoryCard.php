<?php

namespace App\Views\Components;

use App\Models\MedicalHistory;

class MedicalHistoryCard
{
    static function render(MedicalHistory $medical_history)
    {
?>

        <a href="/medical-history?id=<?= $medical_history->id ?>" class="">
            <header>
                <h3><?= $medical_history->pet_name ?></h3>
            </header>
            <p>notes: <?= $medical_history->notes ?></p>
            <p>medications: <?= $medical_history->medications ?></p>
            <span>date: <?= date("d/m/Y", $medical_history->appointment_date) ?></span>
        </a>
<?php
    }
}
