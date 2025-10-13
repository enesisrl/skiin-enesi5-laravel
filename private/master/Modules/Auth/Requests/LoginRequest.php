<?php

namespace Master\Modules\Auth\Requests;

use Illuminate\Validation\ValidationException;
use Master\Modules\Auth\Facades\Auth as AuthModule;
use Master\Modules\Users\Models\User;

class LoginRequest extends \Enesisrl\LaravelMasterCore\Modules\Auth\Requests\LoginRequest
{

    public function authenticate()
    {

        try {
            parent::authenticate();

        } catch (ValidationException $e) {
            $error_message = AuthModule::adminLang('failed');
            $user = User::where('username', $this->input('username'))->first();
            if ($user) {
                if (!$user->isBanned()) {
                    // Assumendo un limite di 5 tentativi (configurabile)
                    $maxAttempts = config('ban.max_login_failed_before_ban');
                    $remainingAttempts = max(0, $maxAttempts - ($user->login_failed_counter ?? 0)) + 1;

                    if ($remainingAttempts < config('ban.max_login_failed_before_ban')) {
                        $error_message = AuthModule::adminLang('remaining_attempts', [
                            'remaining' => $remainingAttempts,
                            'max' => $maxAttempts
                        ]);
                    }
                }else{
                    $error_message = AuthModule::adminLang('banned', [
                        'minutes' => $user->remaining_ban_minutes ?: 0
                    ]);
                }
            }
            throw ValidationException::withMessages([
                'username' => $error_message,
            ]);
        }
    }

}
