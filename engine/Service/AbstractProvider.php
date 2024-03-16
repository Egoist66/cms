<?php

namespace Engine\Service;

use Engine\DI\DI;

abstract class AbstractProvider
{
    /**
     * @var DI
     */
    protected DI $di;


    /** AbstractProvider constructor
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
    }

    /**
     * @return void
     */
    abstract public function init(): void;

}

