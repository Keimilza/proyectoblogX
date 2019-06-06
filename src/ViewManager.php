<?php

namespace App;
use Twig;

class ViewManager
{

    private $twig;

    public function __construct()
    {
        $loader= new \Twig\Loader\FilesystemLoader(dirname(__DIR__).'/templates');//indica donde, en que directorio van a estar las vistas
        // la barra que esta antes de \Twig es para indicar que esta en el use Twig y no en namespace App
        $this->twig = new \Twig\Environment($loader,[
            'cache' => dirname(__DIR__).'/cache/views'
        ]);
    }
    
    public function render($view, $args=[]) //para cargar las vistas
    {
        if($args !=null){
            extract ($args, EXTR_SKIP); //extract es un metodo propio de php, y con EXTR_SKIP trae toda la informacion o argumento de la variable

        }
        $file = dirname(__DIR__)."/templates/".$view;
        if(is_readeable($file)){
            require $file;
        }else{
            throw new \InvalidArgumentException();
        }
    }

    public function renderTemplate($template, $args=[]) //renderiza el template
    {
        echo $this->twig->render($template, $args);
    }
}