<?php

namespace Master\Modules\Regioni\Facades;

use Illuminate\Support\Facades\Facade;

class Regioni extends Facade {

    protected static function getFacadeAccessor() {
        return 'RegioniModule';
    }

}
