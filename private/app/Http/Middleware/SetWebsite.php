<?php

namespace App\Http\Middleware;

use Closure;

class SetWebsite extends  \Enesisrl\LaravelMasterCore\Middleware\SetWebsite {
    
    public function handle($request, Closure $next){

        return parent::handle($request,$next);
        
    }
}
