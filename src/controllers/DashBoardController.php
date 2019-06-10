<?php

namespace App\controllers;
use App\services\UsersService;
use App\services\PostsService;
use Kint;


class DashBoardController extends ControllerAuth 
{
     public function index()
     {
        // $user = $this->sessionManager->get('user'); //como ya tengo la variable de session puedo hacer esta linea
        //  Kint::dump('user recogid ->'.$user);
       //  if(!$user) return $this->redirectTo('login');
       //$UsersService = $this->container->get(UsersService::class);
       $PostsService = $this->container->get(PostsService::class);
      // $id=$this->sessionManager->get('user');
       $posts = $PostsService->getPostsByIdUser($this->user->id);
       //$user= $UsersService->getUserById($id);
       //if(!$user) return $this->redirectTo('login');
       $this->viewManager->renderTemplate('dashboard.view.html',['user'=>$this->user->email,'posts'=>$posts]);
     }
    
}
