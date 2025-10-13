<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Guest extends  \Enesisrl\LaravelMasterCore\Middleware\Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        return parent::handle($request,$next,...$guards);
    }
}
