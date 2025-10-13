<?php

namespace Master\Foundation\Form\Fields;

use Master\Foundation\Form\Field as BaseField;

class Toggle extends BaseField {

    public function render() {
        $value = ($this->config("toggle_value")) ?: 1;
        //echo $this->getName().": ".$this->model->getCustomValue($this->getName());
        $checked = ($this->getValue() == $this->config("toggle_value")) ? 'checked="checked"' : '';
        return '<div class="form-group">' .
            '<label for="'.$this->getName().'_field">' . $this->getLabel() . '</label>' .
            '<span class="switch">'.
            '<label>'.
            '<input class="'.$this->config("customCssClasses").'" type="checkbox" '.$checked.' value="'.$value.'" name="'.$this->getName().'" id="'.$this->getName().'_field">'.
            '<span></span>'.
            '</label>'.
            '</span>'.
            '</div>';
    }

    public function getDisplayValue(){
        $value = parent::getDisplayValue();
        if (!$value){
            if ($this->getValue() == ($this->config("checkbox_value")) || 1){
                $value = '<i class="text-success fa fa-check"></i>';
            }else{
                $value = '<i class="text-danger fas fa-times"></i>';
            }
        }
        return $value;
    }

}