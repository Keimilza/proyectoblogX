<?php
namespace App;
use DI\Container;
use App\config\Config;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Kint;

class DoctrineManager{

    private $container;
    public $em; //va a gestionar todas las entidades de la BD
    
    public function __construct(Container $container)
    {
        $this->container = $container;
        $dbconfig = Config::getDB();
        $paths=[
            dirname(__DIR__).'/models/entities', //Entities es una tupla o extracion de una tabla
            dirname(__DIR__).'/models/repositories' //Repositories es donde estan varias entidades
        ];
        $isDevMode=true;
        $config=Setup::createAnnotationMetadataConfiguration($paths,$isDevMode,null,null,false);
        AnnotationRegistry::registerLoader('class_exists');
        $this->em=EntityManager::create($dbconfig, $config); //aqui recoge el Entity manager
    }

}