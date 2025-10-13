<?php

namespace Master\Foundation;

use Illuminate\Support\Arr;

class Tool  extends \Enesisrl\LaravelMasterCore\Foundation\Tool {

    public function getSkierTypesForSelect(){
        $ret = [];
        $ret[] = ['value'=>config('constants.skier_types.beginner'),'description'=>config('constants.skier_types.beginner')." -> ".__('admin::option.skier_type_beginner'),'option'=>__('admin::option.skier_type_beginner')];
        $ret[] = ['value'=>config('constants.skier_types.average'),'description'=>config('constants.skier_types.average')." -> ".__('admin::option.skier_type_average'),'option'=>__('admin::option.skier_type_average')];
        $ret[] = ['value'=>config('constants.skier_types.expert'),'description'=>config('constants.skier_types.expert')." -> ".__('admin::option.skier_type_expert'),'option'=>__('admin::option.skier_type_expert')];
        return $ret;
    }

    public function getSkierTypeDescription($value){
        $ret = null;
        $skier_types = $this->getSkierTypesForSelect();
        foreach ($skier_types as $skier_type){
            if (Arr::get($skier_type,'value') == $value){
                $ret = Arr::get($skier_type,'option');
            }
        }
        return $ret;
    }
}
