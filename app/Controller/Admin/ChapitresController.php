<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class ChapitresController extends AppController{

    /**
     * Chargement du modéle associé à la classe
     * ChapitresController constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->loadModel('Chapitre');
    }

    /**
     *Gestion de la page d'administration des chapitres
     */
    public function index(){
        $chapitres = $this->Chapitre->all();
        $this->render('admin.chapitres.index', compact('chapitres'));
    }

    /**
     *Gestion de l'ajout d'un chapitre
     */
    public function add(){
        if (!empty($_POST)) {
            $result = $this->Chapitre->create([
                'titre_chapitre' => $_POST['titre_chapitre'],
                'contenu_chapitre' => $_POST['contenu_chapitre'],
                'statut_id' => $_POST['statut_id']
            ]);
            if($result){
                return $this->index();
            }
        }
        $this->loadModel('Statut');
        $statuts = $this->Statut->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.chapitres.edit', compact('statuts', 'form'));
    }

    /**
     * Gestion des modifications faites sur un chapitre
     */
    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Chapitre->update($_GET['id'], [
                'titre_chapitre' => $_POST['titre_chapitre'],
                'contenu_chapitre' => $_POST['contenu_chapitre'],
                'statut_id' => $_POST['statut_id']
            ]);
            if($result){
                return $this->index();
            }
        }
        $chapitre = $this->Chapitre->find($_GET['id']);
        $this->loadModel('Statut');
        $statuts = $this->Statut->extract('id', 'titre');
        $form = new BootstrapForm($chapitre);
        $this->render('admin.chapitres.edit', compact('chapitre','statuts', 'form'));
    }

    /**
     * Gestion de la suppression d'un chapitre
     */
    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Chapitre->delete($_POST['id']);
            return $this->index();
        }
    }
}