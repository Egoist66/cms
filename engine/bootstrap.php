<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\CMS;
use Engine\DI\DI;


try {
    //Dependency injection
    $di = new DI();
    $di->set('test', ['db' => 'db_obj']);
    $di->set('test2', ['mail' => 'db_obj2']);


    $cms = new CMS($di);
    $cms->run();


} catch (\ErrorException $e) {
    echo $e->getMessage();
}