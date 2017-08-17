<?php
namespace Core\HTML;
class BootstrapForm extends Form{

    /**
     * Met en forme le code html passé en paramétre
     * @param $html string
     * @return string
     */
    protected function surround($html){
        return "<div class=\"form-group\">{$html}</div>";
    }

    /**
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label>' . $label . '</label>';
        if($type === 'textareatinymce') {
            $input = '<textarea name="' . $name . '" class="form-control" id="1">' . $this->getValue($name) . '</textarea>';
            }elseif($type === 'comment'){
                $input = '<textarea name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
            }else{
                $input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control">';
        }
        return $this->surround($label . $input);
    }

    public function select($name, $label, $options){
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach($options as $k => $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    /**
     * @return string
     */
    public function submit(){
        return $this->surround('<button type="submit" class="btn btn-success">Envoyer</button>');
    }
}