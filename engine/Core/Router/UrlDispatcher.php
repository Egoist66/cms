<?php


namespace Engine\Core\Router;

use Engine\Core\Router\DispatchedRoute;

class UrlDispatcher {

    private array $methods = [
      'GET',
      'POST'

    ];

    private array $routes = [
        'GET'  => [],
        'POST' => []
    ];

    private array $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+',
    ];
    
    /**
     * addPattern
     *
     * @param  mixed $key
     * @param  mixed $pattern
     * @return void
     */
    public function addPattern(string $key, string $pattern){
        $this->patterns[$key] = $pattern;
    }

    
    /**
     * routes
     *
     * @param  mixed $method
     * @return mixed
     */
    public function routes(string $method): mixed {
        return $this->routes[$method] ?? [];
    }
    
    /**
     * dispatch
     *
     * @param  mixed $method
     * @param  mixed $uri
     * @return void
     */
    public function dispatch(string $method , string $uri){
        $route = $this->routes(strtoupper($method));

        if(array_key_exists($uri, $route)){
            return new DispatchedRoute($route[$uri]);
        }
        
    }
}
