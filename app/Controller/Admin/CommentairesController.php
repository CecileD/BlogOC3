<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class CommentairesController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Commentaire');
    }

    public function index()
    {
        $items = $this->Commentaire->allBySignal();
        $this->render('admin.commentaires.index', compact('items'));
    }

    public function add()
    {
        if (!empty($_POST)) {
        $result = $this->Commentaire->create([
            'sujet_commentaire' => $_POST['sujet_commentaire'],
            'contenu_comment' => $_POST['contenu_comment'],
        ]);
        return $this->index();
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.commentaires.edit', compact('form'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->Commentaire->update($_GET['id'], [
                'sujet_commentaire' => $_POST['sujet_commentaire'],
                'contenu_comment' => $_POST['contenu_comment'],
                'signalement' => $_POST['signalement'],
            ]);
            return $this->index();
        }
        $commentaire = $this->Commentaire->find($_GET['id']);
        $form = new BootstrapForm($commentaire);
        $this->render('admin.commentaires.edit', compact('form'));
    }
    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Commentaire->delete($_POST['id']);
            return $this->index();
        }
    }
}