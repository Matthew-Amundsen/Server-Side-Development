<?php

namespace App\Views;

class MovieSuggestSuccessView
{
    public function render()
    {
        $page = "moviesuggestsuccess";
        $page_title = "Thanks for the suggestion";
        include "templates/master.inc.php";
    }

    public function content()
    {
        include "templates/moviesuggestsuccess.inc.php";
    }
}
