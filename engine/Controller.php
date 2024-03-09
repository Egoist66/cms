<?php

namespace Engine;

use Engine\DI\DI;

abstract class AbstractController {

    protected DI $di;

    public function __construct(DI $di){
        $this->di = $di;
    }

}
