<?php

namespace App\Http\Middleware;

use Closure;


class SetLocale extends  \Enesisrl\LaravelMasterCore\Middleware\SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        return parent::handle($request,$next);
    }
}
