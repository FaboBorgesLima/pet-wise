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
        Head::render("View");
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

                    <input name="pet_name" value="<?= $item ? $item->pet_name : '' ?>">
                    <textarea name="notes" placeholder="notes"><?= $item ? $item->notes : '' ?></textarea>
                    <textarea name="medications" placeholder="medication"><?= $item ? $item->medications : '' ?></textarea>
                    <input name="appointment_date" type="date" value="<?= $item ? date("Y-m-d", $item->appointment_date) : date("Y-m-d") ?>">
                    <button type="submit">Send</button>
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
