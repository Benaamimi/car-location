<?php

namespace App\Core;

use App\Controller\Front\HomeController;
use App\Controller\Front\ContactController;
use App\Controller\Front\CarController;
use App\Controller\Front\reservationController;


class Router
{
    private array $routes;//tableau associatif pour stocker les routes url et fonction associciés
    private $currentController;//stock le controleur actuel pour l'action demandé
    

    public function __construct()
    {
        //Ajoute des routes dans le constructeur, donc à l'initialisation de l'objet
        $this->add_route('/',function(){
            $this->currentController = new HomeController();//créer une instance du controlleur d'accueil 
            $this->currentController->index();// Appelle la méthode index du controleur d'accueil
        });
        // Route pour la page contact avec un parametre id
        $this->add_route('/contact/{id}', function($params){// On peut passer les eventuels paramètres à la fonction
            $this->currentController = new ContactController();
            $this->currentController->index($params);
        });

        $this->add_route('/contact/form', function($params){
            $this->currentController = new ContactController();
            $this->currentController->saveForm($params);
        });

        $this->add_route('/car', function($params){
            $this->currentController = new CarController();
            $this->currentController->index($params);
        });
        // Ajouter une route /car/{id}, function creera une objet de type CarController et il appellera la method index() {require_once templates->front>car.php H1 Bienvenue dans la page des voitures}
        
        $this->add_route('/reservation/{id}', function($params){
            $this->currentController = new reservationController();
            $this->currentController->index($params);
        });


    }

    private function add_route(string $route, callable $closure)  
    {
        //Convertit la route en une expression réguilière pour une correspondance flexible en url et parametre 
        $pattern = str_replace('/','\/', $route);//Echappe ls barres obliques pour la regex
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^\/]+)', $pattern);//Remplace les partie entre accolade par des (parametre) 
        $pattern = '/^'. $pattern . '$/';// Ajoute les délimiteurs de début et de fin de la regex
        $this->routes[$pattern] = $closure;// Stock la regex de la route et la fonction associée dans le tableau des routes
    }

    public function execute()
    {
        $requestUri = $_SERVER['REQUEST_URI'];//recupere l'url de la requete
        $finalPath = str_replace('/car-location', '', $requestUri); // Supprime le dossier racine pour obtenir le chemin final


        foreach($this->routes as $key => $closure)
        {
            if(preg_match($key, $finalPath, $matches)){
                array_shift($matches);
                $closure($matches);// Appelle la fonction associée à la route avec les eventuels paramètres capturés
                return;
            }
        }
        require_once '../templates/error-404.php';
    } 

}