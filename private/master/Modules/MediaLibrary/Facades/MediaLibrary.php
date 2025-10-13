<?php

namespace Master\Modules\MediaLibrary\Facades;

use Illuminate\Support\Facades\Facade;

class MediaLibrary extends Facade {

    protected static function getFacadeAccessor() {
        return 'MediaLibraryModule';
    }

}
