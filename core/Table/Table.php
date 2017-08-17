<?php
namespace Core\Table;

use Core\Database\Database;

/**
 * Class Table
 * @package Core\Table
 */
class Table
{

    /**
     * @var string
     */
    protected $table;
    /**
     * @var Database
     */
    protected $db;

    /**
     * Table constructor.
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    /**
     * requête de sélection de tous les éléments dans une table
     * @return mixed Tableau d'objets
     */
    public function all(){
        return $this->requete('SELECT * FROM ' . $this->table);
    }

    /**
     * requête de sélection d'un élément d'id défini dans une table
     * @param $id
     * @return mixed un tableau contenant un objet unique
     */
    public function find($id){
        return $this->requete("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * requête de mise à jour d'un élément d'id défini dans une table
     * @param $id
     * @param $fields
     * @return mixed tableau contenant le nouvel objet
     */
    public function update($id, $fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->requete("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id){
        return $this->requete("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * requête de création d'un nouvel enregistrement dans une table
     * @param $fields
     * @return mixed
     */
    public function create($fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->requete("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }



    /**
     * Définit si on effectue directement la requete demandée ou bien si l'on passe par une variable intermédiaire
     * Prévention des injections SQL
     * @param $statement
     * @param null $attributes
     * @param bool $one
     * @return mixed
     */
    public function requete($statement, $attributes = null, $one = false){
        if($attributes){
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->requete(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }


    /**
     * Gestion de la construction d'une liste de valeur pour un champ
     * @param $key
     * @param $value
     * @return array
     */
    public function extract($key, $value){
        $records = $this->all();
        $return = [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

}