<?php

namespace Engine\Service\Database;

use Engine\Core\Database\Database;
use Engine\Service\AbstractProvider;

class DataBaseProvider extends AbstractProvider
{
    /**
     * @var string
     */
    public string $serviceName = 'db';


        
    /**
     * inits services
     *
     * @return void
     */
    final public function init(): void
    {
        $db = Database::dbInst();

        $this->di->set($this->serviceName, $db);
    }
}

