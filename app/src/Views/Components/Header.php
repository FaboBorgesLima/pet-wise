<?php

namespace App\Views\Components;

class Header
{
    public static function render()
    {
?>
        <nav>
            <div class="flex flex-row items-center gap-1">
                <img src="/public/assets/logo.svg" class="logo" />
                <h1 class="main-title">PetWise</h1>
            </div>
            <a class="button button-outline" href="/">Dashboard</a>
        </nav>
<?php
    }
}
