<?php


namespace Engine\Core\Router;

use Engine\Utils\VarDumper\VarDumper;

class UrlDispatcher
{

    private array $methods = ['GET', 'POST'];

    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * @var array|string[]
     */
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

    /**
     * @param string $method
     * @param string $pattern
     * @param string $controller
     * @return void
     */
    public final function register(string $method, string $pattern, string $controller): void
    {
        $converted = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$converted] = $controller;

    }

    /**
     * @param string $pattern
     * @return string
     */
    private function convertPattern(string $pattern): mixed

    {

        if (!str_contains($pattern, '(')) {

            return $pattern;
        }
        return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);
    }

    private function replacePattern(array $matches): string
    {
        VarDumper::dump('print', $matches);
        $str = '(?<' .$matches[1]. '>' . strtr($matches[2], $this->patterns) .')';
        echo $str;
        return $str;
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

    public final function doDispatch(string $method, string $uri): DispatchedRoute|null
    {
        foreach ($this->routes($method) as $route => $controller) {
            $pattern = '#^' . $route . '$#s';
            if (preg_match($pattern, $uri, $parameters)) {
                return new DispatchedRoute($controller, $parameters);
            }

        }

        return null;
    }
}
