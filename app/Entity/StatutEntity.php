<?php
namespace App\Entity;

use Core\Entity\Entity;

class StatutEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=chapitres.statut&id=' . $this->id;
    }

}