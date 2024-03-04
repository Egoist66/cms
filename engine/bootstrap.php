<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\CMS;
use Engine\DI\DI;
use Engine\Utils\VarDumper;

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


    VarDumper::dump('Print', $di, ['size'=>'18px','color'=>'purple']);


} catch (\ErrorException $e) {
    echo $e->getMessage();
}