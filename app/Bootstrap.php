<?php

class Bootstrap
{
    private $diContainer;
    private $routes;
    
    public function __construct(ServiceContainer $diContainer, array $routes)
    {
        $this->diContainer = $diContainer;
        $this->routes = $routes;
        $this->loadRoutes();
    }
    
    private function loadRoutes()
    {
        $app = $this->diContainer->getApp();
        foreach ($this->routes as $route) {
            $handler = $this->getHandler($route['handler']);
            $httpMethod = $route['method'];
            if (is_array($httpMethod)) {
                call_user_func_array(array($app->map($route['url'], $handler), 'via'),
                                     $httpMethod);
            } else {
                $httpMethod = strtolower($httpMethod);
                $app->$httpMethod($route['url'], $handler);
            }
        }
    }
    
    private function getHandler($handler)
    {
        $handler = explode('::', $handler);
        $controller = $handler[0];
        $action = $handler[1];
        $getterName = 'get' . $controller;
        return array($this->diContainer->$getterName(), $action);
    }
}
