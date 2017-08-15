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

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function connexion($username, $password){
        $user = $this->db->prepare('SELECT * FROM auteurs WHERE pseudo_auteur = ?', [$username], null, true);
        $hash=$user->motdepasse_auteur;
        if($user and password_verify($password,$hash)){
                return true;}
        else {
                return false;}
    }

    public function estConnecte(){
        return isset($_SESSION['auth']);
    }

}