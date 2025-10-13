<?php

namespace Master\Modules\Websites\Facades;

use Illuminate\Support\Facades\Facade;

class Websites extends Facade {

    protected static function getFacadeAccessor() {
        return 'WebsitesModule';
    }

}
