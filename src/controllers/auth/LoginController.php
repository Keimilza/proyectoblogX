<?php
namespace App\controllers\auth;
use App\controllers\Controller;
use App\DoctrineManager;
use App\models\entities\User;

use Kint;

class LoginController extends Controller
{
    private $error;
    public function index(){
      $this->error = null;
      $this->viewManager->renderTemplate('\auth\login.view.html');
    }
    
    public function login(DoctrineManager $doctrine){
        $email = $_POST['email'];
        $password = $_POST['passwd'];
        $repository=$doctrine->em->getRepository(User::class);  //aqui obtengo el objeto
        //Kint::dump($user->findOneByEmail("keimilza@gmail.com")); //aqui traigo la coincidencia de la BD por email
        //Kint::dump($user->findOneByName("KEIMILZA MINOTTI")); // aqui traigo la coincidencia de la BD por nombre
        $user = $repository->findOneByEmail($email);
        if(!$user) 
        {   
           $this->error = "El usuario no existe";
           return  $this->viewManager->renderTemplate('\auth\login.view.html',['error'=>$this->error]); //aqui se le pasa como parametro a la vista el 'error' y la vista con {% error %} lo entiende
        }
      
        if($user->password !== sha1($password))
        {
           $this->error = "El usuario o password es incorrecto";
           return $this->viewManager->renderTemplate('\auth\login.view.html',['error'=>$this->error]);
        }
      
        $this->sessionManager->put('user',$user->id); //dentro de la variable de session 'user' se agrega el id del usuario
        $this->redirectTo('dashboard');
    }
}