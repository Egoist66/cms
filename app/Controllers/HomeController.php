<?php

namespace App\Controllers;

use Engine\AbstractController;
use Engine\Core\Template\View;
use Engine\Utils\VarDumper\VarDumper;

class HomeController extends CmsController
{
    

    public final function index(): void
    {
        $arr = [1, 2, 3, 4, 5];
        
        $this->view->render('index', ['arr' => $arr]);
    }

    public final function news(array $params): void
    {
        if(!isset($params['id'])){
            VarDumper::dump('dump', 'Hello news ' . __FILE__, __LINE__);
            return;
        }

}


}