<?php

namespace App\Views;

use App\Views\Components\Head;
use App\Views\Components\Header;
use App\Views\Components\MedicalHistoryCard;

class ShowAll
{
    public static function render(array $list)
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <?php
        Head::render("Dashboard");
        ?>

        <body>
            <main class="container">
                <?php Header::render(); ?>
                <div style="display: grid; grid-template-columns: repeat(2,1fr);">
                    <?php
                    foreach ($list as $item) {
                        MedicalHistoryCard::render($item);
                    }
                    ?>
                </div>
                <a href="/medical-history" class="button">Add Medical History</a>
            </main>

        </body>

        </html>
<?php
    }
}
