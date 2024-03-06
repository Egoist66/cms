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
     * @return VarDumper
     */
    public static final function dump(string $type, mixed $arg, ?array $style = ["size" => "18px", "color" => "skyblue"]): VarDumper
    {
        switch (ucfirst($type)) {
            case VarDumperTypes::Dump->name:

                echo "<pre 
                    style='font-size: {$style["size"]}; 
                    color: {$style["color"]};
                    background: #0d0f15;;
                    padding: 15px;
                    margin: 0px 0px 10px 0px;;
                    border-radius: 10px;
                    white-space: pre-wrap;
                    overflow-x: auto;
                    '
                    
                    >";

                var_dump($arg);
                echo "</pre>";
                break;
            case VarDumperTypes::Print->name:
                echo "<pre style='font-size: {$style["size"]}; 
                    color: {$style["color"]};
                    background: #0d0f15;;
                    padding: 15px;
                    margin: 0px 0px 10px 0px;
                    border-radius: 10px;
                    white-space: pre-wrap;
                    overflow-x: auto;
                    '>";

                print_r($arg);
                echo "</pre>";
                break;
            case VarDumperTypes::Debug->name:
                echo "<pre style='font-size: {$style["size"]}; 
                    color: {$style["color"]};
                    background: #0d0f15;;
                    padding: 15px;
                    margin: 0px 0px 10px 0px;
                    border-radius: 10px;
                    white-space: pre-wrap;
                    overflow-x: auto;
                    '>";

                print "<mark>$arg</mark>";
                echo "</pre>";
                break;
            case VarDumperTypes::JSON->name:
                echo "<pre style='font-size: {$style["size"]}; 
                    color: {$style["color"]};
                    background: #0d0f15;
                    margin: 0px 0px 10px 0px;
                    padding: 10px;
                    border-radius: 10px;
                    white-space: pre-wrap;
                    overflow-x: auto;
                    '>";
                echo json_encode($arg);
                echo "</pre>";
                break;

        }

        return new self();
    }

    /**
     * @param string $file
     * @param int $line
     * @param string|null $color
     * @return void
     */
    public final function fline(string $file, int $line, ?string $color = 'skyblue'): void
    {
        VarDumper::dump('Print', $file . ", " . "line: " . $line, ["size" => "18px", "color" => $color ?? 'black']);
    }


}

