<?php

namespace Master\Modules\Roles\Facades;

use Illuminate\Support\Facades\Facade;

class Roles extends Facade {

    protected static function getFacadeAccessor() {
        return 'RolesModule';
    }

}
