<?php 

namespace App\controllers;

class LogoutController extends Controller
{
    public function index()
    {
        $this->sessionManager->remove('user');
        $this->redirectTo('login');
    }
}