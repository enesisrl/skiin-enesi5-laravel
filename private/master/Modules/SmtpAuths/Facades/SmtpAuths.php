<?php

namespace Master\Modules\SmtpAuths\Facades;

use Illuminate\Support\Facades\Facade;

class SmtpAuths extends Facade {

    protected static function getFacadeAccessor() {
        return 'SmtpAuthsModule';
    }



}
