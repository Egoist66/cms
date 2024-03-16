<?php

namespace Engine\Service\Router;

use Engine\Core\Router\Router;
use Engine\Service\AbstractProvider;
use Engine\Utils\VarDumper\VarDumper;


class RouterProvider extends AbstractProvider
{

    public string $serviceName = 'router';

    /**
     * inits services
     *
     * @return void
     */
    public final function init(): void
    {

        $router = new Router('http://cms/');
        $this->di->set($this->serviceName, $router);
    }
}
