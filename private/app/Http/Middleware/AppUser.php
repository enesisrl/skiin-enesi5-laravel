<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AppUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $appUser_id = $request->get('user_id');
        if ($appUser_id){
            $appUser = \Master\Modules\AppUsers\Models\AppUser::getByProgId($appUser_id);
            if ($appUser){
                $userData = $request->all();
                $appUser->storeAppData($userData);
            }
        }

        return $next($request);
    }
}
