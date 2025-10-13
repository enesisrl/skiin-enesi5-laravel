<?php

namespace Front\Main\Facades;

use Illuminate\Support\Facades\Facade;

class Render extends Facade {

    protected static function getFacadeAccessor() {
        return 'Front\Main\Classes\Render';
    }

}
