<?php

namespace Master\Modules\Services\Facades;

use Illuminate\Support\Facades\Facade;

class Services extends Facade {

    protected static function getFacadeAccessor() {
        return 'ServicesModule';
    }

}
