<?php

namespace App\Views\Components;

use App\Models\MedicalHistory;

class MedicalHistoryCard
{
    public static function render(MedicalHistory $medical_history)
    {
?>

        <div href="/medical-history?id=<?= $medical_history->id ?>" class="card">
            <header class="card-header">
                <h3><?= $medical_history->pet_name ?></h3>
            </header>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">notes: <?= $medical_history->notes ?></li>
                    <li class="list-group-item">medications: <?= $medical_history->medications ?></li>
                    <li class="list-group-item">date: <?= date("d/m/Y", $medical_history->appointment_date) ?></li>
                </ul>
            </div>
            <a class="btn btn-primary" href="/medical-history?id=<?= $medical_history->id ?>">Edit<i class="bi bi-pencil"></i></a>
        </div>
<?php
    }
}
