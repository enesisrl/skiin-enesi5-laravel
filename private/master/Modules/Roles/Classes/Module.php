<?php

namespace Master\Modules\Roles\Classes;

use Enesisrl\LaravelMasterCore\Modules\Roles\Classes\Module as BaseModule;
use Master\Modules\Roles\Models\Role;


class Module extends BaseModule {

    public function getRolesForSelect(){
        return Role::select("id as value", "name as description")->where('name','!=','Super-Admin')->orderBy("name")->get();
    }
}
