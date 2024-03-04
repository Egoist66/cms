<?php


namespace Engine\Core\Router;



class DispatchedRoute {

    private object $controller;
    private array $parameters;

    public function __construct(object $controller, array $parameters = []){
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    
    /**
     * getController
     *
     * @return object
     */
    public function getController(): object{
        return $this->controller;
    }    
    /**
     * getParameters
     *
     * @return array
     */
    public function getParameters(): array{
        return $this->parameters;
    }



}
