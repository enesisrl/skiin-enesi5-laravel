<?php

namespace Master\Facades;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

class FrontAuth extends Facade {

    protected static function getFacadeAccessor() {
        return 'FrontAuth';
    }

}
