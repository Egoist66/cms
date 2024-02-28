<?php

namespace Engine\Utils;

use Exception;

enum VarDumperTypes
{
    case Dump;
    case Print;
    case Debug;

    case JSON;
}


final class VarDumper
{

    /**
     * @param string $type
     * @param mixed $arg
     * @param array|null $style
     * @return void
     * @throws Exception
     */
    public static final function dump(string $type, mixed $arg, ?array $style = ["size" => "18px", "color" => "black"]): void
    {
        switch ($type) {
            case VarDumperTypes::Dump->name:

                echo "<pre style='font-size: {$style["size"]}; color: {$style["color"]}'>";
                var_dump($arg);
                echo "</pre>";
                break;
            case VarDumperTypes::Print->name:
                echo "<pre style='font-size: {$style["size"]}; color: {$style["color"]}'>";
                print_r($arg);
                echo "</pre>";
                break;
            case VarDumperTypes::Debug->name:
                echo "<pre style='font-size: {$style["size"]}; color: {$style["color"]}'>";
                print "<mark>$arg</mark>";
                echo "</pre>";
                break;
            case VarDumperTypes::JSON->name:
                echo "<pre style='font-size: {$style["size"]}; color: {$style["color"]}'>";
                echo json_encode($arg);
                echo "</pre>";
                break;

            default:
                $method = __METHOD__;
                throw new Exception("Unknown type -- `$type` -- argument for $method method!");
        }
    }
}

