<?php
declare(strict_types=1);

namespace Engine;
use Engine\DI\DI;
use Engine\Utils\VarDumper;
use Engine\Core\Database\Database;



class CMS
{
    /**
     * @var DI
     */
    private DI $di;


    public function __construct(DI $di){
        $this->di = $di;
    }

    /**
     * Run CMS app
     */
    public final function run(): void {

       VarDumper::dump('Print', $this->di);

    }
}