<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

class AuteursController extends AppController {

    /**
     *Gestion de la connexion
     */
    public function connexion(){
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->connexion($_POST['pseudo_auteur'], $_POST['motdepasse_auteur'])){
                header('Location: index.php?p=admin.chapitres.index');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('auteurs.connexion', compact('form', 'errors'));
    }
}