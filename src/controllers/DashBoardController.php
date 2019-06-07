<?php

namespace App\controllers;

class DashBoardController extends Controller 
{
     public function index()
     {
         $user = $this->sessionManager->get('user'); //como ya tengo la variable de session puedo hacer esta linea
         if(!$user) return $this->redirectTo('login');
         $this->viewManager->renderTemplate('dashboard.view.html',['user'=>'keimilza@gmail.com']);
     }
}
