<?php

namespace App\Views\Components;

class Header
{
    static function render()
    {
?>
        <nav>
            <h1>PetWise</h1>
            <a class="button button-outline" href="/">Dashboard</a>
        </nav>
<?php
    }
}
