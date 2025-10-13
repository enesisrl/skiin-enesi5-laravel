<?php

namespace Front\Main\Facades;

use Illuminate\Support\Facades\Facade;

class Notifications extends Facade {

    protected static function getFacadeAccessor() {
        return 'Front\Main\Classes\Notifications';
    }

}
