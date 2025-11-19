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

        $searchForm->addField('Select', [
            'name' => 'search.category_id',
            'type' => 'values',
            'resultSet' => \Master\Modules\Statistics\Facades\Statistics::getCategoriesForSelect(),
            'label' => __('admin::label.category'),
            'sessionValue' => $sessionValues["search_category_id"] ?? null,
        ]);

        $searchForm->addField('Select', [
            'name' => 'search.measure_id',
            'type' => 'values',
            'resultSet' => \Master\Modules\Statistics\Facades\Statistics::getMeasuresForSelect(),
            'label' => __('admin::label.measure'),
            'sessionValue' => $sessionValues["search_measure_id"] ?? null,
        ]);

        $searchForm->addField('Select', [
            'name' => 'search.brand_id',
            'type' => 'values',
            'resultSet' => \Master\Modules\Statistics\Facades\Statistics::getBrandsForSelect(),
            'label' => __('admin::label.brand'),
            'sessionValue' => $sessionValues["search_brand_id"] ?? null,
        ]);

        $searchForm->addField('Select', [
            'name' => 'search.year',
            'label' => __('admin::label.year'),
            'type' => 'values',
            'resultSet' => \Master\Modules\Statistics\Facades\Statistics::getYearsForSelect(),
            'sessionValue' => $sessionValues["search_year"] ?? null,
        ]);

        $searchForm->addField('Varchar', [
            'name' => 'search.code',
            'search_type' => 'like',
            'label' => __('admin::label.article_code'),
            'sessionValue' => $sessionValues["search_code"] ?? null,
        ]);

        $searchForm->addField('Varchar', [
            'name' => 'search.description',
            'label' => __('admin::label.description'),
            'search_type' => 'like',
            'sessionValue' => $sessionValues["search_description"] ?? null,
        ]);

        $searchForm->addField('Daterange', [
            'name' => 'search.date',
            'sessionValue' => (isset($sessionValues["search_date"])) ? $sessionValues["search_date"] : null,
            'sessionValueFrom' => (isset($sessionValues["search_date_from"])) ? $sessionValues["search_date_from"] : null,
            'sessionValueTo' => (isset($sessionValues["search_date_to"])) ? $sessionValues["search_date_to"] : null,
            'label' => __('admin::label.date_range')
        ]);

        $searchForm->addField('Select', [
            'name' => 'orderField',
            'label' => __('admin::label.orderField'),
            'type' => 'values',
            'resultSet' => \Master\Modules\Statistics\Facades\Statistics::getSearchFormOrderFields(),
            'sessionValue' => $sessionValues["orderField"] ?? null,
        ]);

        $searchForm->addField('Select', [
            'name' => 'orderType',
            'label' => __('admin::label.orderType'),
            'type' => 'values',
            'resultSet' => [['value'=>'ASC','description'=>__('admin::label.asc')],['value'=>'DESC','description'=>__('admin::label.desc')]],
            'sessionValue' => $sessionValues["orderType"] ?? null,
        ]);

        $searchForm->addTab([
            'label' => __('admin::label.parametri_ricerca'),
            'content' => [
                ['search.date|col:8'],
                ['search.category_id|col:4','search.measure_id|col:4','search.brand_id|col:4'],
                ['search.code|col:4','search.description|col:4','search.year|col:4'],
                [':separator'],
                ['orderField|col:4','orderType|col:4'],
            ]
        ]);



    },
];