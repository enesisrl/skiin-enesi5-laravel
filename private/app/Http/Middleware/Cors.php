<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Cors
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Gestione corretta dei diversi tipi di risposta
        if ($response instanceof BinaryFileResponse) {
            // Per BinaryFileResponse dobbiamo usare headers->set()
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
        } else {
            // Per Response standard possiamo usare header()
            $response->header('Access-Control-Allow-Origin', '*');
            $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
            $response->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
        }

        return $response;


    }
}
