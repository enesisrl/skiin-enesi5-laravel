<?php

namespace Master\Modules\Addresses\Facades;

use Illuminate\Support\Facades\Facade;

class Addresses extends Facade {

    protected static function getFacadeAccessor() {
        return 'AddressesModule';
    }



}
