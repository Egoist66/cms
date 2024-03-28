<?php

namespace Engine\Core\Router;

final class Router
{

    private array $routes = [];
    private $dispatcher;
    private string $host;

    public function __construct(string $host)
    {
        $this->host = $host;

    }


    /**
     * adds route
     *
     * @param mixed $key
     * @param mixed $pattern
     * @param mixed $controller
     * @param mixed $method
     * @return void
     */
    public final function add(string $key, string $pattern, string $controller, string $method = 'GET'): void
    {


        $this->routes[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method

        ];


    }

    /**
     * dispatch
     *
     * @param mixed $method
     * @param mixed $uri
     * @return DispatchedRoute|null
     */


    public final function dispatch(string $method, string $uri): DispatchedRoute|null
    {
        return $this->getDispatcher()->dispatch($method, $uri);
    }

    /**
     * @return UrlDispatcher
     */
    public final function getDispatcher(): UrlDispatcher
    {
        if (is_null($this->dispatcher)) {
            $this->dispatcher = new UrlDispatcher();
            foreach ($this->routes as $route) {
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }

        return $this->dispatcher;
    }


}


