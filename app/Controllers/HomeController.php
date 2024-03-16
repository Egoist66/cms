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

    public final function news(array $params): void
    {
        if(!isset($params['id'])){
            VarDumper::dump('dump', 'Hello news ' . __FILE__, __LINE__);
            return;
        }

        VarDumper::dump('dump', 'Hello news ' . $params['id'] . ' ' . __FILE__, __LINE__);
    }


}