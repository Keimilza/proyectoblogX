<?php
namespace App\controllers;
use App\ViewManager;
use App\LogManager;
use DI\Container;
use App\DoctrineManager;

abstract class Controller
{

    protected $container;
    protected $viewManager;
    protected $logger;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->viewManager = $this->container->get(ViewManager::class);
        $this->logger = $this->container->get(LogManager::class);
        $this->logger->info("Clase ".get_class($this)." cargada");
    }

    public abstract function index(DoctrineManager $doctrine);
}