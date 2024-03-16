<?php

namespace App\Controllers;

use Engine\AbstractController;
use Engine\Utils\VarDumper\VarDumper;

class HomeController extends CmsController
{

    public final function index(): void
    {
        VarDumper::dump('dump', 'Hello home', __FILE__, __LINE__);
    }

    public final function news(array $idd): void
    {
        VarDumper::dump('print', func_get_args());
        VarDumper::dump('dump', 'Hello news' . __FILE__, __LINE__);
    }


}