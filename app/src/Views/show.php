<?php

namespace App\Views;

use App\Models\MedicalHistory;
use App\Views\Components\Head;
use App\Views\Components\Header;

class Show
{
    static function render(?MedicalHistory $item = null)
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <?php
        Head::render($item ? $item->pet_name : "create");
        ?>

        <body>
            <main class="container">
                <?php Header::render(); ?>
                <form method="post" action="/medical-history<?= $item ? '/update' : '' ?>">
                    <?php
                    if ($item):
                    ?>
                        <input style="display: none;" name="id" value="<?= $item->id ?>">
                    <?php endif ?>
                    <label for="petName">pet name</label>
                    <input name="pet_name" id="petName" placeholder="pet name" value="<?= $item ? $item->pet_name : '' ?>">
                    <label for="notes">notes</label>
                    <textarea name="notes" id="notes" placeholder="notes"><?= $item ? $item->notes : '' ?></textarea>
                    <label for="medications">medications</label>
                    <textarea name="medications" id="medications" placeholder="medication"><?= $item ? $item->medications : '' ?></textarea>
                    <label for="appointmentDate">appointment date</label>
                    <input name="appointment_date" id="appointmentDate" type="date" value="<?= $item ? date("Y-m-d", $item->appointment_date) : date("Y-m-d") ?>">
                    <button type="submit"><?= $item ? 'update' : 'create' ?></button>
                </form>
                <?php if ($item): ?>
                    <form method="post" action="/medical-history/delete">
                        <input style="display: none;" name="id" value="<?= $item->id ?>">
                        <button type="submit">Delete</button>
                    </form>
                <?php endif ?>
            </main>

        </body>

        </html>
<?php
    }
}
