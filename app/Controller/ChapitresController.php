<?php

namespace App\Controller;

use Core\HTML\BootstrapForm;

/**
 * Class ChapitresController
 * @package App\Controller
 */
class ChapitresController extends AppController{


    /**
     * ChapitresController constructor.
     */
    public function __construct(){
        parent::__construct();//Appelle le constructeur parent qui injecte le chemin
        $this->loadModel('Chapitre');
        $this->loadModel('Statut');
        $this->loadModel('Commentaire');

    }

    /**
     *Construit puis appelle la vue d'accueil du blog
     */
    public function index(){
        $chapitres = $this->Chapitre->chapitresPublies();
        $this->render('chapitres.index', compact('chapitres', 'statuts'));
    }

    /**
     *Construit puis appelle la vue détail d'un chapitre incluant les commentaires avec gestion des id de chapitres incorrects
     */
    public function detail(){
        $chapitres= $this->Chapitre->findWithStatut($_GET['id']);
        If(!empty($chapitres)){
            $commentaires=$this->Commentaire->findWithCommentaire($_GET['id']);
            $form = new BootstrapForm($_POST);
                if (!empty($_POST)) {
                    $result = $this->Commentaire->create([
                        'chapitre_id'=>$_GET['id'],
                        'sujet_commentaire' => $_POST['sujet_commentaire'],
                        'contenu_comment' => $_POST['contenu_comment'],
                    ]);
                    return $this->index();
                }
                else {$this->render('chapitres.detail', compact( 'chapitres','commentaires','form'));}
            }
        else {
            return $this->notFound();
        }
    }

    /**
     *Renvoie la liste des statuts disponibles
     */
    public function statut(){
        $statut = $this->Statut->find($_GET['id']);
        if($statut === false){
            $this->notFound();
        }
        $chapitres = $this->Chapitre->lastByStatut($_GET['id']);
        $statuts = $this->Statut->all();
        $this->render('chapitres.statut', compact('chapitres', 'statuts', 'statut'));
    }

}