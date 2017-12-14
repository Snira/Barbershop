<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;
use Illuminate\Routing\Route;

class OptionsResponse
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($request->getMethod() === "OPTIONS") {
            if (url()->current() == 'http://gbhavelaar.nl/api/appointments') {
                return response('')->header('Allow', [ 'GET', 'POST', 'OPTIONS' ]);
            } else {
                return response('')->header('Allow', [ 'GET','PUT','DELETE', 'OPTIONS' ]);
            }

        }

        return $next($request);
    }
}
