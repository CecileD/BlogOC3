<?php
/**
 * Created by PhpStorm.
 * User: CecileDagneaux
 * Date: 26/07/2017
 * Time: 09:26
 */

namespace App\Table;


use Core\Table\Table;

class CommentaireTable extends Table {

    protected $table = 'commentaires';

    public function findWithCommentaire($chapitre_id){
        return $this->requete("
            SELECT commentaires.id, commentaires.sujet_commentaire, commentaires.contenu_comment, commentaires.date_creation_comment, commentaires.signalement, chapitres.id as chapitre
            FROM commentaires
            LEFT JOIN chapitres ON chapitre_id = chapitres.id
            WHERE commentaires.chapitre_id = ? 
              AND commentaires.signalement=0
            ORDER BY commentaires.date_creation_comment DESC" ,[$chapitre_id], false);
    }

    public function allBySignal(){
        return $this->requete("
            SELECT commentaires.id, commentaires.sujet_commentaire, commentaires.contenu_comment, commentaires.date_creation_comment, commentaires.signalement, commentaires.chapitre_id
            FROM commentaires
            ORDER BY commentaires.signalement DESC" ,null, false);
    }
}