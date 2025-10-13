<?php

namespace Master\Modules\Toponyms\Facades;

use Illuminate\Support\Facades\Facade;

class Toponyms extends Facade {

    protected static function getFacadeAccessor() {
        return 'ToponymsModule';
    }



}
