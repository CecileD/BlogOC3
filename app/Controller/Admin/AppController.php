<?php

namespace App\Controller\Admin;

use \App;
use \Core\Auth\DBAuth;


class AppController extends \App\Controller\AppController{

    /**
     * Gestion de la connexion lorsque l'on souhaite afficher une page préfixée admin
     * AppController constructor.
     */
    public function __construct(){
        parent::__construct();
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if(!$auth->estConnecte()){
            $this->forbidden();
        }
    }

}