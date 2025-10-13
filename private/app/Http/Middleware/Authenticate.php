<?php

namespace App\Http\Middleware;

use Closure;

class Authenticate extends \Enesisrl\LaravelMasterCore\Middleware\Authenticate {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        return parent::handle($request, $next, $guards);
    }

    protected function redirectTo($request) {
        return parent::redirectTo($request);
    }

}