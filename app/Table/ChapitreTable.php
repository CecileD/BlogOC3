<?php
namespace App\Table;

use App\Entity\CommentaireEntity;
use Core\Table\Table;

class ChapitreTable extends Table{

    protected $table = 'chapitres';


    public function chapitresPublies(){
        return $this->requete("
            SELECT chapitres.id, chapitres.titre_chapitre, chapitres.contenu_chapitre, chapitres.date_creation_chapitre, statuts.titre as statut
            FROM chapitres
            LEFT JOIN statuts ON statut_id = statuts.id
            WHERE chapitres.statut_id =2
            ORDER BY chapitres.date_creation_chapitre ASC");
    }

    /**
     * Récupère les derniers chapitres
     * @return array
     */
    public function last(){
        return $this->requete("
            SELECT chapitres.id, chapitres.titre_chapitre, chapitres.contenu_chapitre, chapitres.date_creation_chapitre, statuts.titre as statut
            FROM chapitres
            LEFT JOIN statuts ON statut_id = statuts.id
            ORDER BY chapitres.date_creation_chapitre ASC");
    }

    /**
     * Récupère les derniers chapitres ayant le statut demandé
     * @param $statut_id int
     * @return array
     */
    public function lastByStatut(){
        return $this->requete("
            SELECT chapitres.id, chapitres.titre_chapitre, chapitres.contenu_chapitre, chapitres.date_creation_chapitre, statuts.titre as statut
            FROM chapitres
            LEFT JOIN statuts ON statut_id = statuts.id
            WHERE chapitres.statut_id =?
            ORDER BY chapitres.date_creation_chapitre ASC", [statut_id]);
    }


    /**
     * Récupère un chapitre en liant le statut associé
     * @param $id int
     * @return \App\Entity\ChapitreEntity
     */
    public function findWithStatut($id){
        return $this->requete("
            SELECT chapitres.id, chapitres.titre_chapitre, chapitres.contenu_chapitre, chapitres.date_creation_chapitre, statuts.titre as statut
            FROM chapitres
            LEFT JOIN statuts ON statut_id = statuts.id
            WHERE chapitres.id = ?", [$id], true);
    }

}