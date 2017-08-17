<?php

namespace App\Controller;

use Core\HTML\BootstrapForm;


class CommentairesController extends AppController
{
    public function __construct(){
        parent::__construct();//Appelle le constructeur parent qui injecte le chemin
        $this->loadModel('Commentaire');
    }
    public function signaler(){
        if (!empty($_POST)) {
            $result = $this->Commentaire->update($_POST['id'],[
                'signalement'=>$_POST['signalement'],
                ]);
        }
        $commentaire = $this->Commentaire->find($_POST['id']);
        $form = new BootstrapForm($commentaire);
        $this->render('commentaires.confirmation', compact('form'));
    }

}