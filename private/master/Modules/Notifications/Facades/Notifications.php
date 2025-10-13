<?php

namespace Master\Modules\Notifications\Facades;

use Illuminate\Support\Facades\Facade;

class Notifications extends Facade {

    protected static function getFacadeAccessor() {
        return 'NotificationsModule';
    }



}
