<?php

namespace App\controllers;
use Kint;


class DashBoardController extends Controller 
{
     public function index()
     {
        // $user = $this->sessionManager->get('user'); //como ya tengo la variable de session puedo hacer esta linea
        //  Kint::dump('user recogid ->'.$user);
       //  if(!$user) return $this->redirectTo('login');
         $this->viewManager->renderTemplate('dashboard.view.html',['user'=>'keimilza@gmail.com']);
     }
}
