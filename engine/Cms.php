<?php
declare(strict_types=1);

namespace Engine;

use Admin\AdminRoutes;
use App\Routes\Routes;
use Engine\Core\Router\DispatchedRoute;
use Engine\Core\Router\Router;
use Engine\DI\DI;
use Engine\Helper\DoIfClassExists;
use Engine\Helper\Request;
use Engine\Utils\VarDumper\VarDumper;
use Exception;

class Cms
{
    /**
     * @var DI
     */
    private DI $di;
    public Router $router;


    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

   

    /**
     * Run CMS app
     */
    public final function run(): void
    {

        try {

            if(ENV == 'App'){
                Routes::register($this);
            }
            else {

                AdminRoutes::register($this);
            }

            $routerDispatch = $this->router->dispatch(Request::getRequestMethod(), Request::getUrlPath());
            if (!$routerDispatch) {
                $routerDispatch = new DispatchedRoute('ExceptionController/page404');

            }

            [$classController, $action] = explode('/', $routerDispatch->getController(), 2);
            $controller = '\\'. ENV . '\\Controllers\\' . $classController;



            DoIfClassExists::action($controller, $action, fn() => (
                call_user_func_array([new $controller($this->di), $action], [$routerDispatch->getParameters()])


            ), [__FILE__, __LINE__]);
        } catch (Exception $exception) {
            VarDumper::dump('danger', $exception, __FILE__, __LINE__);
            exit;
        }


    }
}
//
//class Hello {
//    public function greet(): string{
//        return 'Hello mansdsdf!';
//    }
//}
//
//$services = [
//    [
//        "provider" => Hello::class,
//        "action" => 'greet'
//    ]
//];
//
//foreach ($services as $service){
//   $hello = new $service['provider'];
//   $method = $service['action'];
//    echo $hello->$method();
//}