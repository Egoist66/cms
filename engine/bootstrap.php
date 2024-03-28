<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\Cms;
use Engine\DI\DI;
use Engine\Utils\VarDumper\VarDumper;

try {
    //Dependency injection
    $di = new DI();
    $services = require_once __DIR__ . '/Config/Service/service.php';

    // Init services

    foreach ($services as $service) {
        $provider = new $service($di);
        $provider->init();

    }


    $cms = new Cms($di);
    $cms->run();





} catch (Exception $e) {

    VarDumper::dump('danger', $e, __FILE__, __LINE__);


}

