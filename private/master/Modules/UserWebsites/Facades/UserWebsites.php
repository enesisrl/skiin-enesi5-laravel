<?php

namespace Master\Modules\UserWebsites\Facades;

use Illuminate\Support\Facades\Facade;

class UserWebsites extends Facade {

    protected static function getFacadeAccessor() {
        return 'UserWebsitesModule';
    }

}
