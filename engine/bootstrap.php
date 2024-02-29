<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\CMS;
use Engine\DI\DI;


try {
    //Dependency injection
    $di = new DI();
    $services =  require_once __DIR__ . '/Config/Service/service.php';

    // Init services

    foreach ($services as $service){
        $provider = new $service($di);
        $provider->init();
    }

    $cms = new CMS($di);
    $cms->run();


} catch (\ErrorException $e) {
    echo $e->getMessage();
}