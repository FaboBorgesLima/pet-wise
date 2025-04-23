<?php

namespace App\Views\Components;

class Header
{
    public static function render()
    {
?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="/public/assets/logo.svg" class="logo" />
            <h1 class="main-title">PetWise</h1>
            <a class="btn btn-primary" href="/">Dashboard</a>
        </nav>
<?php
    }
}
