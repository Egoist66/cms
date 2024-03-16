<?php

namespace App\Controllers;

use Engine\AbstractController;
use Engine\Utils\VarDumper\VarDumper;

class HomeController extends AbstractController
{

    public final function index(): void
    {
        VarDumper::dump('print', 'Hello home', __FILE__, __LINE__);
    }

    public final function news(): void
    {
        VarDumper::dump('print', 'Hello news', __FILE__, __LINE__);
    }


}