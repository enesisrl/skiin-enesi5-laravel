<?php

namespace Master\Foundation\Form\Fields;

use Illuminate\Support\Facades\App;
use Master\Foundation\Form\Form;
use Master\Modules\Countries\Facades\Countries;
use Master\Modules\Province\Facades\Province;

class Address extends \Enesisrl\LaravelMasterCore\Foundation\Form\Fields\Address {

    protected $form;

    public function register() {

        $prefix = $this->getName();

        $this->form = new Form;

        $general_rules = [];
        $provincia_rules = [];
        $comune_rules = [];
        $comune_select_rules = [];
        if ($this->config("required")) {
            $general_rules[] = 'required';
            $provincia_rules[] = 'required_if:'.$prefix.'__country_id,'.Countries::getCountryItId();
        }
        $this->form->addField('Hidden', [
            'name' => "{$prefix}",
            'data-attrs' => 'data-admin-address-field="'.$prefix.'"'
        ]);

        $this->form->addField('Select', [
            'name' => "{$prefix}__country_id",
            'label' => __('admin::label.country'),
            'type' => 'values',
            'customCssClasses' => $this->config("customCssClasses"),
            'address_field' => $prefix,
            'resultSet' => Countries::getCountriesForSelect(),
            'readonly' => ($this->config("readonly")) ? $this->config("readonly") : false,
            'rules' => array_merge([
            ], $general_rules)
        ]);

        $this->form->addField('Select', [
            'name' => "{$prefix}__provincia_id",
            'label' => __('admin::label.provincia'),
            'type' => 'values',
            'customCssClasses' => $this->config("customCssClasses"),
            'address_field' => $prefix,
            'resultSet' => Province::getProvinceForSelect(),
            'readonly' => ($this->config("readonly")) ? $this->config("readonly") : false,
            'rules' => $provincia_rules
        ]);

        $this->form->addField('Varchar', [
            'name' => "{$prefix}__indirizzo",
            'address_field' => $prefix,
            'customCssClasses' => $this->config("customCssClasses"),
            'label' => __('admin::label.address'),
            'readonly' => ($this->config("readonly")) ? $this->config("readonly") : false,
            'rules' => array_merge([
                'max:255'
            ], $general_rules)
        ]);


        $this->form->addField('Varchar', [
            'name' => "{$prefix}__cap",
            'address_field' => $prefix,
            'customCssClasses' => $this->config("customCssClasses"),
            'label' => __('admin::label.cap'),
            'readonly' => ($this->config("readonly")) ? $this->config("readonly") : false,
            'rules' => array_merge([
                'max:255'
            ], $general_rules)
        ]);


        $this->form->addField('Varchar', [
            'name' => "{$prefix}__comune",
            'address_field' => $prefix,
            'customCssClasses' =>  implode(" ",[$this->config("customCssClasses"),'comune_field','comune_input']),
            'label' => __('admin::label.city'),
            'readonly' => ($this->config("readonly")) ? $this->config("readonly") : false,
            'rules' => array_merge([
                'max:255'
            ], $general_rules)
        ]);

        $this->form->addField('Varchar', [
            'name' => "{$prefix}__frazione",
            'address_field' => $prefix,
            'customCssClasses' =>  implode(" ",[$this->config("customCssClasses"),'frazione_field']),
            'label' => __('admin::label.frazione'),
            'readonly' => ($this->config("readonly")) ? $this->config("readonly") : false,
            'rules' => ['max:255']
        ]);


        $this->form->addField('Select', [
            'name' => "{$prefix}__comune_select",
            'address_field' => $prefix,
            'type' => 'values',
            'customCssClasses' => implode(" ", [$this->config("customCssClasses"), 'comune_field', 'comune_select']),
            'label' => __('admin::label.city'),
            'readonly' => ($this->config("readonly")) ? $this->config("readonly") : false
        ]);

        $this->form->addField('Autocomplete', [
            'name' => "{$prefix}__toponym",
            'address_field' => $prefix,
            'type' => 'values',
            'customCssClasses' => $this->config("customCssClasses"),
            'label' => __('admin::label.toponym'),
            'autocomplete_options' => [
                'url' => App::make('ToponymsModule')->adminRoute('autocompleteToponyms'),
                'name' => "{$prefix}__toponym"
            ],
            'readonly' => ($this->config("readonly")) ? $this->config("readonly") : false,

        ]);


        if (!$this->config("hide_latlng")) {
            $this->form->addField('Coords', [
                'name' => "{$prefix}__coords",
                'address_field' => $prefix,
                'customCssClasses' => $this->config("customCssClasses"),
                'label' => __('admin::label.coords')
            ]);
        }
    }


    /* Render
    ------------------------------------------------------------ */

    public function render() {
        $this->form->setViewMode($this->viewMode);
        if ($this->form->getFields()) {
            foreach ($this->form->getFields() as $field) {
                $field->setViewMode($this->viewMode);
            }
        }
        $prefix = $this->getName();
        return $this->form->renderContent([
            [':section-title|title:'.$this->getLabel()],
            ["{$prefix}","{$prefix}__country_id|col:6", "{$prefix}__provincia_id|col:6"],
            ["{$prefix}__comune|col:5","{$prefix}__comune_select|col:5", "{$prefix}__cap|col:2", "{$prefix}__frazione|col:5"],
            ["{$prefix}__toponym|col:1","{$prefix}__indirizzo|col:7", "{$prefix}__coords|col:4"],
        ]);
    }

}
