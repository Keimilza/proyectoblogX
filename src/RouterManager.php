<?php

namespace App;
use Kint;
use DI\Container;

class RouterManager
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function dispatch(string $requestMethod, string $requestUri, \FastRoute\Dispatcher $dispatcher )
    {
            $route = $dispatcher->dispatch($requestMethod, $requestUri);
            switch($route[0]){
                case \FastRoute\Dispatcher::NOT_FOUND:
                   header("HTTP/1.0 404 Not Found");
                   $this->container->call(["App\controllers\NotFoundController", "index"], [0]);
                   break;
                break;
                case \FastRoute\Dispatcher::FOUND:
                   $controller = $route[1];  //$route[0] si existe o no la ruta, $route[1] el controlador y el metodo, $route[2] parametros que se le pasen por la uri
                   $method = $route[2];
                   $this->container->call($controller, $method);  //call dice que desde la clase $controller llama al metodo $method
                   // kint::dump($route);
                break;

                case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED: //si se llama a un metodo POST al iniciar una web, entonces genera este error
                   header("HTTP/1.0 405 Method not Allowed");
                   echo "<h1> METHOD NO ALLOWED </h1>";
                break;
            }
    }
}