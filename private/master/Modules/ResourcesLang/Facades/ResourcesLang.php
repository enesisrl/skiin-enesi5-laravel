<?php

namespace Master\Modules\ResourcesLang\Facades;

use Illuminate\Support\Facades\Facade;

class ResourcesLang extends Facade {

    protected static function getFacadeAccessor() {
        return 'ResourcesLangModule';
    }

}
