<?php
namespace Core\Auth;

use Core\Database\Database;

class DBAuth {

    private $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function getUserId(){
        if($this->estConnecte()){
            return $_SESSION['auth'];
        }
        return false;
    }

    public function connexion($username, $password){
        $user = $this->db->prepare('SELECT * FROM auteurs WHERE pseudo_auteur = ?', [$username], null, true);
        if($user){
            if(password_verify($password,$user->motdepasse_auteur)) {
                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        return false;
    }

    /**
     * Permet de vérifier si l'utilisateur est connecté lorsqu'il accède aux url prefixées admin
     * @return bool
     */
    public function estConnecte(){
        return isset($_SESSION['auth']);
    }

}