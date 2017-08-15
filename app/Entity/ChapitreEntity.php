<?php
namespace App\Entity;

use Core\Entity\Entity;

class ChapitreEntity extends Entity{



    public function getUrl(){
        return 'index.php?p=chapitres.detail&id=' . $this->id;
    }

    public function getExtrait(){
        $html = '<p>' . substr($this->contenu_chapitre, 0, 400) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }



}