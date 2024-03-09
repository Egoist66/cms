<?php


namespace Engine\Core\Router;

class UrlDispatcher
{

    private array $methods = ['GET', 'POST'];

    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    private array $patterns = [
        'int' => '[0-9]+',
        'str' => '[a- zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+',
    ];

    /**
     * addPattern
     *
     * @param mixed $key
     * @param mixed $pattern
     * @return void
     */
    public final function addPattern(string $key, string $pattern): void
    {
        $this->patterns[$key] = $pattern;
    }


    /**
     * routes
     *
     * @param mixed $method
     * @return array
     */
    public final function routes(string $method): array
    {
        return $this->routes[$method] ?? [];
    }

    public final function register(string $method, string $pattern, string $controller): void
    {
        $this->routes[strtoupper($method)][$pattern] = $controller;
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
        $routes = $this->routes(strtoupper($method));


        if (array_key_exists($uri, $routes)) {

            return new DispatchedRoute($routes[$uri]);
        }
        return $this->doDispatch($method, $uri);
    }

    public final function doDispatch(string $method, string $uri): DispatchedRoute | null
    {
        foreach ($this->routes($method) as $route => $controller) {
            $pattern = '#^' . $route . '$#s';
            if(preg_match($pattern, $uri, $parameters)){
                return new DispatchedRoute($controller, $parameters);
            }

        }

        return  null;
    }
}
