<?php

namespace Master\Modules\Acceptances\Facades;

use Illuminate\Support\Facades\Facade;

class Acceptances extends Facade {

    protected static function getFacadeAccessor() {
        return 'AcceptancesModule';
    }

}
