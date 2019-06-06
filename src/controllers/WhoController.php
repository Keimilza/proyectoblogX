<?php
namespace App\controllers;
use App\DoctrineManager;

class WhoController extends Controller
{
    public function index(DoctrineManager $doctrine){
        $this->viewManager->renderTemplate("who.view.html");
    }
}