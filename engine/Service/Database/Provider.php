<?php

namespace Engine\Service\Database;

use Engine\Core\Database\Database;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public string $serviceName = 'db';
    final public function init(): void
    {
        $db = Database::dbInst();
        $this->di->set($this->serviceName, $db);
    }
}

