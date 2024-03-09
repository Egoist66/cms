<?php

namespace App\Controllers;

use Engine\Controller;
use Engine\DI\DI;

class CmsController extends Controller
{

    /**
     * Main CMS-app controller constructor
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent::__construct($di);
    }

    public  function template(string $path): bool | string{
        ob_start();
        include_once $path;
        return ob_get_clean();
    }
}