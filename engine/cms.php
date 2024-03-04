<?php
declare(strict_types=1);

namespace Engine;
use Engine\DI\DI;
use Engine\Utils\VarDumper;
use Engine\Core\Database\Database;
use Engine\Core\Router\Router;

class CMS
{
    /**
     * @var DI
     */
    private DI $di;
    public Router $router;


    public function __construct(DI $di){
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    /**
     * Run CMS app
     */
    public final function run(): void {

        //$this->router->add('home', '/', 'HomeController/index');
    }
}