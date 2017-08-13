<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class AppController extends Controller{

    protected  $template = 'default';

    //Construit le chemin
    public function __construct(){
        $this->viewPath = ROOT . '/app/views/';
    }

    // Charge les tables
    protected function loadModel($model_name){
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

}