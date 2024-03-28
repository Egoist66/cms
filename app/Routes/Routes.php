<?php

namespace App\Routes;

use Engine\Cms;

final class Routes {
    final static public   function register(Cms $cms): void
    {
        $cms->router->add('home', '/', 'HomeController/index');
        $cms->router->add('news', '/news', 'HomeController/news');
        $cms->router->add('news_single', '/news/(id:int)', 'HomeController/news');

    }
}