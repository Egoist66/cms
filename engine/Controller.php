<?php

namespace Engine;

use Engine\Core\Database\Database;
use Engine\DI\DI;

abstract class Controller {

    protected DI $di;
    protected Database $db;

    /**
     * @param DI $di
     */
    public function __construct(DI $di){
        $this->di = $di;
    }

}
