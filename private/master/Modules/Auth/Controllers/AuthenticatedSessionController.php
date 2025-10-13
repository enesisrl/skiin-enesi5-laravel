<?php

namespace Master\Modules\Auth\Controllers;


use Enesisrl\LaravelMaster2fa\Traits\Auth\HasTwoFactorMethods;
use Enesisrl\LaravelMasterCore\Modules\Auth\Controllers\AuthenticatedSessionController as BaseController;


class AuthenticatedSessionController extends BaseController
{
    use HasTwoFactorMethods;

}
