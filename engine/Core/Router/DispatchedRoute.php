<?php


namespace Engine\Core\Router;



use Engine\controller;

class DispatchedRoute {

    private string $controller;
    private array $parameters;

    public function __construct(string $controller, array $parameters = []){
        $this->controller = $controller;
        $this->parameters = $parameters;
    }


    /**
     * getController
     *
     * @return string
     */
    public final function getController(): string
    {

        return $this->controller;
    }    
    /**
     * getParameters
     *
     * @return array
     */
    public final function getParameters(): array{
        return $this->parameters;
    }



}
