<?php

namespace Engine\Helper;

use Engine\Utils\VarDumper\VarDumper;

class DoIfClassExists
{
    public static function action(string $className, string $method, callable $callback, array $options = []): void{
        if(class_exists($className) && method_exists($className, $method)){
            $callback();
        }
        else {

            VarDumper::dump('danger', "Unknown class $className and method $method invocation are tried to call!", $options['0'] ?? '', (int) $options['1'] ?? '');

        }
    }
}