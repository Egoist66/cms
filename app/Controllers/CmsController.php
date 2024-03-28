<?php

namespace App\Controllers;

use Engine\AbstractController;
use Engine\DI\DI;

class CmsController extends AbstractController
{

    /**
     * Main CMS-app controller constructor
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent::__construct($di);
    }

    
}

