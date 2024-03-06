<?php

namespace Engine\Service\Router;

use Engine\Core\Router\Router;
use Engine\Service\AbstractProvider;



class Provider extends AbstractProvider
{

    public string $serviceName = 'router';
        
    /**
     * inits services
     *
     * @return void
     */
    final public function init(): void {

        $router = new Router('http://cms/');

        $this->di->set($this->serviceName, $router);
    }
}
