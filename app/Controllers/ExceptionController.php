<?php

namespace App\Controllers;

use Engine\Utils\VarDumper\VarDumper;

class ExceptionController extends CmsController
{

    public final function page404(): void
    {

        VarDumper::dump('danger', 404, __FILE__, __LINE__);
    }

}