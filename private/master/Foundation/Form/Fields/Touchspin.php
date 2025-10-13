<?php

namespace Master\Foundation\Form\Fields;

use Master\Foundation\Form\Field as BaseField;

class Touchspin extends BaseField {


    public function render() {

        $placeholder = ($this->config("placeholder")) ? $this->config("placeholder") : "";
        $readonly =  ($this->config("readonly")) ? "readonly=\"readonly\"" : null;

        if ($this->config("disable_on_edit")){
            if (!$readonly){
                $readonly = "readonly=\"readonly\"";
            }
        }

        $config = [];
        if (!is_null($this->config('min'))){
            $config['min'] = $this->config('min');
        }
        if (!is_null($this->config('max'))){
            $config['max'] = $this->config('max');
        }
        if (!is_null($this->config('step'))){
            $config['step'] = $this->config('step');
        }
        if (!is_null($this->config('decimals'))){
            $config['decimals'] = $this->config('decimals');
        }

        return '<div class="form-group">' .
            '<label>' . $this->getLabel() . '</label>' .
            '<input data-admin-touchspin=\''.json_encode($config).'\' class="form-control text-right touchspin '.$this->config("customCssClasses").'" '.$readonly.' '.$this->searchAttributes().' placeholder="'.htmlspecialchars($placeholder,ENT_QUOTES).'" type="text" value="' . htmlspecialchars($this->getValue(), ENT_QUOTES) . '" name="' . $this->getName() . '" id="' . $this->getName() . '_field">' .
            $this->getHelp().
            '</div>';
    }

}
