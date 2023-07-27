<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Model\User;
use App\Core\Session;

class UserController extends AbstractController
{
    public function index()
    {
       
        require_once "../templates/front/form-inscription.php";
   
    }

    public function saveUser()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            
            $pseudo = trim($_POST['pseudo']);
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $pswd = trim($_POST['pswd']);

            

        

            if(empty($pseudo)){
                Session::setFlashMessage("Le champs pseudo est vide !");
                header('Location:/car-location/inscription');//redirige ver le formulaire
                exit();
            }

            if(empty($email)){
                Session::setFlashMessage("Le champs email est incomplet !");
                header('Location:/car-location/inscription');
                exit();
            }

            
            if(empty($pswd)){
                Session::setFlashMessage("veuillez entrer votre mot de passe !");
                header('Location:/car-location/inscription');
                exit();
            }

            var_dump($pswd);
            
            $user = new User();
            if($user->isEmailExiste($email))
            {
                Session::setFlashMessage("l'email existe déjà !");
                header('Location:/car-location/inscription');
                exit();
            }

            // hash cript le mot de passe il faut l'utilise aprés l'execution car il cripte meme le champ pswd vide 
            $pswd = password_hash(trim($_POST['pswd']), PASSWORD_DEFAULT);
            $user->saveUser($pseudo, $email, $pswd);
            
            

        }
    }

}