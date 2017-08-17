<?php

use Core\Config;
use Core\Database\MysqlDatabase;

class App{

    /**
     * Assigne la valeur à la variable titre de l'application
     * @var string
     */
    public $title = "Billet simple pour l'Alaska";
    /**
     * Gère la connexion à la base de données
     * @var
     */
    private $db_instance;
    /**
     * Contient les informations de session
     * @var
     */
    private static $_instance;

    /**
     * @return App
     */
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    /**
     * Initialisation de la session, enregistrement des autoloader
     * (initialisation de la pile permettant le chargement des fichiers de classe)
     */
    public static function chargement(){
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    /**
     * Renvoie le nom du fichier contenant les requêtes associées à une  table dans la base de données
     * Exemple : Les méthodes/requêtes spécifiques à la table et donc à la classe chaître sont contenues dans le fichier ChapitreTable
     * @param $name
     * @return mixed
     */
    public function getTable($name){
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    /**
     * Vérifie si une connexion pré_existe à la requête et dans la négative initialise la connexion
     * @return MysqlDatabase
     */
    public function getDb(){
        $config = Config::getInstance(ROOT . '/config/config.php');
        if(is_null($this->db_instance)){
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }



}