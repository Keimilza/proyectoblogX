<?php
namespace App\controllers;

use App\services\PostsService;
use App\models\entities\Post;

//use App\DoctrineManager;  //activo por mi
//use App\models\entities\User;
//use App\models\entities\Post;  //creado por mi
use Kint;

class HomeController extends Controller
{
    private $blogs = [];
    public function index(){
     // $user =$doctrine->em->getRepository(User::class)->find(2);
     $PostsService = $this->container->get(PostsService::class);
     $posts=$PostsService->getPosts();
     //Kint::dump($posts);
     $this->viewManager->renderTemplate('index.view.html',['posts'=>$posts]);
      
     //$this->blogs();
     // $this->viewManager->renderTemplate('index.view.html',['blogs'=>$this->blogs]);
    }

    /*public function blogs()
    {
      $doctrineManager = $this->container->get(DoctrineManager::class);
      $repository = $doctrineManager->em->getRepository(Post::class);
      $posts = $repository->findAll();
      $this->blogs = $posts;

      //Kint::dump($this->blogs);  
      //return $this->viewManager->renderTemplate('\auth\login.view.html',['error'=>$this->error]);

       // $user = new \App\models\entities\User(); //o colocamos use App\models\entities\User 
       // $user->name = $name;
       // $user->email = $email;
       // $user->password = sha1($password);
       // $doctrine->em->persist($user); // aqui persiste la entidad dentro la entidad
       // $doctrine->em->flush(); // aqui guarda
        //Kint::dump($user);

    }*/
}