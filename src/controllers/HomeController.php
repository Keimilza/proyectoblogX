<?php
namespace App\controllers;
use App\DoctrineManager;
use App\models\entities\User;
use Kint;

class HomeController extends Controller
{
    public function index(DoctrineManager $doctrine){
      $user =$doctrine->em->getRepository(User::class)->find(2);
      //Kint::dump($user);
      $this->viewManager->renderTemplate("index.view.html");
    }
}