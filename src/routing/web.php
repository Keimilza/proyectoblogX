<?php
namespace App\routing;

use FastRoute\Dispatcher;

class web
{
    public static function getDispatcher(): Dispatcher
    {
        return \FastRoute\simpleDispatcher(
            function (\FastRoute\RouteCollector $route){
                $route->addRoute('GET','/',['App\controllers\HomeController','index']); //inicialmente todo pagina web se carga con un get
                $route->addRoute('GET','/who',['App\controllers\WhoController','index']);
                $route->addRoute('GET','/register',['App\controllers\RegisterController','index']);
                $route->addRoute('POST','/register',['App\controllers\RegisterController','register']); //la palabra register es un metodo de ResgiterController, y en este caso es con metodo post porque el formulario envia con un post
                $route->addRoute('GET','/login',['App\controllers\LoginController','index']);
                $route->addRoute('POST','/login',['App\controllers\LoginController','login']);

            }
        );
    }
}