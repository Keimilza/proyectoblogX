<?php

namespace App\controllers;
use App\services\UsersService;

class PostController extends ControllerAuth
{

    public function index(){
        /*$userService = $this->container->get(UsersService::class);
        $id = $this->sessionManager->get('user');
        $user = $userService->getUserById($id);
        if(!$user) return $this->redirectTo('login'); */
        $this->viewManager->renderTemplate('form-post.view.html',['user'=>$this->user->email]);
    }
}