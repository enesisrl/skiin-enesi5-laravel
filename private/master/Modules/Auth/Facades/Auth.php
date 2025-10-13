<?php

namespace Master\Modules\Auth\Facades;

use Illuminate\Support\Facades\Facade;

class Auth extends Facade {

    protected static function getFacadeAccessor() {
        return 'AuthModule';
    }

}
