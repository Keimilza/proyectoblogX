<?php

namespace App\controllers\auth;
use App\controllers\ControllerAuth;

use App\DoctrineManager;
use Kint;

class RegisterController extends ControllerAuth
{

    public function index()
    {
        $this->viewManager->renderTemplate('auth\register.view.html');
        
    }

    public function register(DoctrineManager $doctrine)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['passwd'];
        //$user = $doctrine->em->getRepository(\App\models\entities\User::class); // devuelve o recuperando la entidad y lo almacena en $user
        $user = new \App\models\entities\User(); //o colocamos use App\models\entities\User 
        $user->name = $name;
        $user->email = $email;
        $user->password = sha1($password);
        $doctrine->em->persist($user); // aqui persiste la entidad dentro la entidad
        $doctrine->em->flush(); // aqui guarda
        //Kint::dump($user);

    }
}