<?php

namespace App\Controllers;

use Engine\AbstractController;
use Engine\Utils\VarDumper\VarDumper;

class ExceptionController extends AbstractController
{

    public final function page404(): void
    {

        VarDumper::dump('danger', 404, __FILE__, __LINE__);
    }

}