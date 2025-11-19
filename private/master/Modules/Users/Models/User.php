<?php

namespace Master\Modules\Users\Models;

use Enesisrl\LaravelMaster2fa\Traits\Users\Models\HasTwoFactor;
use Enesisrl\LaravelMasterCore\Modules\Users\Models\User as BaseModel;
use Enesisrl\LaravelMasterOtp\Traits\Users\Models\HasOtps;

class User extends BaseModel {

    use HasTwoFactor, HasOtps;


    public function getMfaRequiredAttribute(): bool
    {
        if (config('two-factor.enabled')) {
            return config('constants.two-factor.required');
        }
        return false;
    }
}
