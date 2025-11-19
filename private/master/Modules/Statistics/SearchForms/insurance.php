<?php

return [
    'searchForm' => function($searchForm){
        $sessionValues = [];
        /*
        if ($users_customSearch = session()->get("inventories_customSearch")){
            foreach($users_customSearch as $val){
                $sessionValues[$val["name"]] = $val["value"];
            }
        }
        */

        foreach(request()->all() as $key=>$value){
            $sessionValues[$key] = $value;
        }

        $searchForm->addField('Integer', [
            'name' => 'search.duration',
            'label' => __('admin::label.duration_days'),
            'sessionValue' => $sessionValues["search_days"] ?? null,
        ]);

        $searchForm->addField('Daterange', [
            'name' => 'search.date',
            'sessionValue' => (isset($sessionValues["search_date"])) ? $sessionValues["search_date"] : null,
            'sessionValueFrom' => (isset($sessionValues["search_date_from"])) ? $sessionValues["search_date_from"] : null,
            'sessionValueTo' => (isset($sessionValues["search_date_to"])) ? $sessionValues["search_date_to"] : null,
            'label' => __('admin::label.date_range')
        ]);

        $searchForm->addTab([
            'label' => __('admin::label.parametri_ricerca'),
            'content' => [
                ['search.duration|col:4','search.date|col:8'],
            ]
        ]);

    },
];