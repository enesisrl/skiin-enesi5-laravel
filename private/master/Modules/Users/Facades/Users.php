<?php

namespace Master\Modules\Users\Facades;

use Illuminate\Support\Facades\Facade;

class Users extends Facade {

    protected static function getFacadeAccessor() {
        return 'UsersModule';
    }

}
