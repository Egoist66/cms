<?php

namespace Engine\Core\Router;

class Router {

    private array $routes = [];
    private $dispatcher;
    private $host;

    public function __construct($host){
        $this->host = $host;

    }
    
     
  
    
    /**
     * adds route
     *
     * @param  mixed $key
     * @param  mixed $pattern
     * @param  mixed $controller
     * @param  mixed $method
     * @return void
     */
    public function add(string $key, string $pattern, $controller, string $method = 'GET'): void {

        $this->routes[$key] = [
            'pattern'    => $pattern,
            'controller' => $controller,
            'method'     => $method

        ];
    }
    
    /**
     * dispatch
     *
     * @param  mixed $method
     * @param  mixed $uri
     * @return mixed
    */


    public function dispatch(string $method , string $uri){

    }

    public function getDispatcher(){
        if(is_null($this->dispatcher)){
         
        }

        return $this->dispatcher;
    }
}


