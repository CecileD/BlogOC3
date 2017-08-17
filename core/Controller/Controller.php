<?php

namespace Core\Controller;

class Controller{

    protected $viewPath;
    protected $template;

    /**
     * Gestion des vues
     * @param $view
     * @param array $variables
     */
    protected function render($view, $variables = []){
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    /**
     *Gére le message en cas de demande d'une page nécessitant une identification
     */
    public function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('ACCES INTERDIT');
    }

    /**
     *
     */
    public function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('PAGE INTROUVABLE');
    }

}