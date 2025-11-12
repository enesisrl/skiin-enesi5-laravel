<?php

namespace Master\Modules\Acceptances\Classes;

use Master\Foundation\Modules\Crud\Classes\Module as BaseModule;

class Module extends BaseModule {

    public function getAcceptanceTypologies(){
        $ret = [];
        $ret[] = ['value'=>config('constants.typologies.rent_deposit'),'description'=>config('constants.typologies.rent_deposit')." -> ".__('admin::option.typology_rent_deposit'), 'typology_desc'=>__('admin::option.typology_rent_deposit')];
        $ret[] = ['value'=>config('constants.typologies.only_deposit'),'description'=>config('constants.typologies.only_deposit')." -> ".__('admin::option.typology_only_deposit'), 'typology_desc'=>__('admin::option.typology_only_deposit')];
        $ret[] = ['value'=>config('constants.typologies.only_rent'),'description'=>config('constants.typologies.only_rent')." -> ".__('admin::option.typology_only_rent'), 'typology_desc'=>__('admin::option.typology_only_rent')];
        return $ret;
    }

    public function getSearchFormOrderFields(){
        $ret = [];
        $ret[] = ['value'=>'acceptances.created_at','description'=>__('admin::option.created_at')];
        $ret[] = ['value'=>'acceptances.date_in','description'=>__('admin::option.date_in')];
        $ret[] = ['value'=>'acceptances.date_out','description'=>__('admin::option.date_out')];
        $ret[] = ['value'=>'acceptances.name','description'=>__('admin::option.name')];
        $ret[] = ['value'=>'acceptances.site_1','description'=>__('admin::option.site_1')];
        $ret[] = ['value'=>'acceptances.site_2','description'=>__('admin::option.site_2')];
        return $ret;
    }

}
