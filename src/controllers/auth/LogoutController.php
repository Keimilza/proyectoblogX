<?php 

namespace App\controllers\auth;
use App\controllers\Controller;


class LogoutController extends Controller
{
    public function index()
    {
        $this->sessionManager->remove('user');
        $this->redirectTo('login');
    }
}