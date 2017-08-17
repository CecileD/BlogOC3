<?php
namespace App\Entity;

use Core\Entity\Entity;

class ChapitreEntity extends Entity{


    /**
     * Renvoie l'url appelée à partir de l'id du chapitre (gestion du lien sur la page d'accueil)
     * @return string
     */
    public function getUrl(){
        return 'index.php?p=chapitres.detail&id=' . $this->id;
    }


    /**
     * Gestion de la longueur de l'extrait affiché sur la page d'accueil
     * @return string
     */
    public function getExtrait(){
        $html = '<p>' . substr($this->contenu_chapitre, 0, 400) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }



}