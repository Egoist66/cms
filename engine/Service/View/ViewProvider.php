<?php

namespace Engine\Service\View;

use Engine\Core\Template\View;
use Engine\Service\AbstractProvider;


class ViewProvider extends AbstractProvider
{

    public string $serviceName = 'view';

    /**
     * inits services
     *
     * @return void
     */
    public final function init(): void
    {

        $view = new View();
        $this->di->set($this->serviceName, $view);
    }
}
