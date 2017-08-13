<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class StatutsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Statut');
    }

    public function index(){
        $items = $this->Statut->all();
        $this->render('admin.statuts.index', compact('items'));
    }

    public function add(){
        if (!empty($_POST)) {
            $result = $this->Statut->create([
                'titre' => $_POST['titre'],
            ]);
            return $this->index();
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.statuts.edit', compact('form'));
    }

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Statut->update($_GET['id'], [
                'titre' => $_POST['titre'],
            ]);
            return $this->index();
        }
        $category = $this->Statut->find($_GET['id']);
        $form = new BootstrapForm($statut);
        $this->render('admin.statuts.edit', compact('form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Statut->delete($_POST['id']);
            return $this->index();
        }
    }

}