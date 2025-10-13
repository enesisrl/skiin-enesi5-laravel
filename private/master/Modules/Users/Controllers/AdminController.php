<?php

namespace Master\Modules\Users\Controllers;

use Enesisrl\LaravelMaster2fa\Traits\Users\Controllers\HasTwoFactorMethods;
use Enesisrl\LaravelMasterCore\Modules\Users\Controllers\AdminController as BaseController;

class AdminController extends BaseController {

    use HasTwoFactorMethods;
}
