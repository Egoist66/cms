<?php

namespace Engine\Utils\VarDumper;


final class VarDumper
{

    /**
     * @param string $type
     * @param mixed $arg
     * @param array|null $style
     * @return VarDumper
     */
    public static final function dump(string $type, mixed $arg, string $file = __FILE__, int $line = __LINE__, ?array $style = ["size" => "18px", "color" => "skyblue"]): VarDumper
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


                var_dump($arg . ' ' . "<span style='border-bottom: 1px solid wheat; display: inline-block'>" . self::getVDInst()->fline($file, $line) . "</span>");

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

                print_r($arg . ' ' . "<span style='border-bottom: 1px solid wheat; display: inline-block'>" . self::getVDInst()->fline($file, $line) . "</span>");
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
            case VarDumperTypes::Danger->name:
                echo "<pre style='font-size: {$style["size"]}; 
                    color: white;
                    box-shadow: 1px 1px 20px 0px #333;
                    background: red;
                    margin: 0px 0px 10px 0px;
                    padding: 10px;
                    border-radius: 10px;
                    white-space: pre-wrap;
                    overflow-x: auto;
                    '>";
                print_r($arg . ' ' . "<span style='border-bottom: 1px solid wheat; display: inline-block'>" . self::getVDInst()->fline($file, $line) . "</span>");
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
                echo json_encode($arg . ' ' . "<span style='border-bottom: 1px solid wheat; display: inline-block'>" . self::getVDInst()->fline($file, $line) . "</span>");
                echo "</pre>";
                break;

        }

        return new self();
    }

    /**
     * @param string $file
     * @param int $line
     * @param bool|null $alert
     * @return string
     */
    public function fline(string $file, int $line, ?bool $alert = false): string
    {
        if($alert){
            VarDumper::dump('print', __FILE__ . " " . __LINE__);
        }
        return '    '.  $file . ", " . "line: " . $line;
    }

    private static function getVDInst(): VarDumper
    {
        return new self();
    }

}

