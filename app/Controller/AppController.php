<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class AppController extends Controller{

    protected  $template = 'default';

    //Construit le chemin vers le fichier contenant la vue
    public function __construct(){
        $this->viewPath = ROOT . '/app/views/';
    }

    // Charge les tables/modèles associés aux classes
    protected function loadModel($model_name){
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

}