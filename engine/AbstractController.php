<?php

namespace Engine;

use Engine\Core\Database\Database;
use Engine\Core\Template\View;
use Engine\DI\DI;

abstract class AbstractController {

    protected DI $di;
    protected Database $db;

    protected View $view;

    /**
     * @param DI $di
     */
    public function __construct(DI $di){
        $this->di = $di;
        $this->view = $this->di->get('view');

    }

}
