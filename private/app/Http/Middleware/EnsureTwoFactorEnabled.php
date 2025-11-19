<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class EnsureTwoFactorEnabled
{
    public function handle($request, Closure $next)
    {
        //logger()->info('EnsureTwoFactorEnabled Middleware');
        $user = auth()->user();

        // Se non autenticato o non richiesto, prosegui
        if (!$user) {
            return $next($request);
        }

        if (!$user->mfa_required) {
            return $next($request);
        }

        // Se 2FA già attiva, prosegui
        if ($user->two_factor_enabled) {
            return $next($request);
        }


        $allowedRoutes = [
            'UsersModule.admin.twoFactor*',
            'UsersModule.admin.2fa.*',
            'AuthModule.admin.two-factor.*',
            'AuthModule.admin.login',
            'AuthModule.admin.logout',
            'ServicesModule.admin.service_custom_scripts',
            'PushNotificationsModule.admin.*'
        ];

        $ok = false;
        foreach ($allowedRoutes as $routePattern) {
            if (Route::is($routePattern)) {
                $ok = true;
                break;
            }
        }

        // Consenti solo le route definite
        if ($ok) {
            return $next($request);
        }
        //logger()->info('redirectTo 2FA setup');
        session([
            '2fa_proposal_shown' => true
        ]);
        // Altrimenti redirect alla proposta 2FA
        return redirect()->route('AuthModule.admin.two-factor.proposal');
    }
}
