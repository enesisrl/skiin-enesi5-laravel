<?php

namespace Master\Modules\Countries\Facades;

use Illuminate\Support\Facades\Facade;

class Countries extends Facade {

    protected static function getFacadeAccessor() {
        return 'CountriesModule';
    }

}
