<?php
namespace App\controllers;
use App\ViewManager;
use App\LogManager;
use App\SessionManager;
use DI\Container;
use App\DoctrineManager;

abstract class Controller
{

    protected $container;
    protected $viewManager;
    protected $sessionManager;
    protected $logger;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->viewManager = $this->container->get(ViewManager::class);
        $this->logger = $this->container->get(LogManager::class);
        $this->logger->info("Clase ".get_class($this)." cargada");
        $this->sessionManager = $this->container->get(SessionManager::class);
    }

    public abstract function index();

    public function redirectTo(string $page){

        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF'],'/\\'));
        header("Location: http://$host$uri/$page");
    }
}