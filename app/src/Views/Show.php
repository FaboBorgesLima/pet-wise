<?php

namespace App\Views;

use App\Models\MedicalHistory;
use App\Views\Components\Head;
use App\Views\Components\Header;

class Show
{
    public static function render(?MedicalHistory $item = null)
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
                <form method="post" class="card mb-3" action="/medical-history<?= $item ? '/update' : '' ?>">
                    <?php
                    if ($item):
                    ?>
                        <input style="display: none;" name="id" value="<?= $item->id ?>">
                    <?php endif ?>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="petName" class="form-label">pet name</label>
                            <input name="pet_name" id="petName" class="form-control" placeholder="pet name" value="<?= $item ? $item->pet_name : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">notes</label>
                            <textarea name="notes" id="notes" class="form-control" placeholder="notes"><?= $item ? $item->notes : '' ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="medications" class="form-label">medications</label>
                            <textarea name="medications" id="medications" class="form-control" placeholder="medication"><?= $item ? $item->medications : '' ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="appointmentDate" class="form-label">appointment date</label>
                            <input name="appointment_date" class="form-control" id="appointmentDate" type="date" value="<?= $item ? date("Y-m-d", strtotime($item->appointment_date)) : date("Y-m-d",time()) ?>">
                        </div>
                    </div>
                    <button class="btn btn-secondary" type="submit"><?= $item ? 'Save<i class="bi bi-save"></i>' : 'Create' ?></button>
                </form>
                <?php if ($item): ?>
                    <form method="post" action="/medical-history/delete">
                        <input style="display: none;" name="id" value="<?= $item->id ?>">
                        <button class="btn btn-danger" type="submit">Delete<i class="bi bi-trash"></i></button>
                    </form>
                <?php endif ?>

            </main>

        </body>

        </html>
<?php
    }
}
