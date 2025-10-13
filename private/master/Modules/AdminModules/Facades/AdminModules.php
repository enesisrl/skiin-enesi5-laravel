<?php

namespace Master\Modules\AdminModules\Facades;

use Illuminate\Support\Facades\Facade;

class AdminModules extends Facade {

    protected static function getFacadeAccessor() {
        return 'AdminModulesModule';
    }

}
