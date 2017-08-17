<?php
namespace Core\HTML;

/**
 * Class Form
 * Permet de générer un formulaire rapidement et simplement
 */
class Form{

    /**
     * @var array Données utilisées par le formulaire
     */
    private $data;

    /**
     * @var string Tag utilisé pour entourer les champs
     */
    public $surround = 'p';

    /**
     * @param array $data Données utilisées par le formulaire
     */
    public function __construct($data = array()){
        $this->data = $data;
    }


    /**
     * @param $index string Index de la valeur à récupérer
     * @return string
     */
    protected function getValue($index){
        if(is_object($this->data)){
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
}