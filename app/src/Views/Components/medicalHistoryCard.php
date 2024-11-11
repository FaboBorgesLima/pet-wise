<?php

namespace App\Views\Components;

use App\Models\MedicalHistory;

class MedicalHistoryCard
{
    static function render(MedicalHistory $medical_history)
    {
?>

        <a href="/medical-history?id=<?= $medical_history->id ?>" class="">
            <h3>name: <?= $medical_history->pet_name ?></h3>
            <p>notes: <?= $medical_history->notes ?></p>
            <p>medications: <?= $medical_history->medications ?></p>
            <span><?= date("d/m/Y", $medical_history->appointment_date) ?></span>
        </a>
<?php
    }
}
