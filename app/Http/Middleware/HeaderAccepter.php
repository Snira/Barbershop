<?php

namespace App\Http\Middleware;

use Closure;

class HeaderAccepter
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
        $acceptHeader = $request->header('Accept');
        if ($acceptHeader == 'application/json' || $acceptHeader == 'application/x-www-form-urlencoded') {
            return $next($request);
        } else {
            return response()->json([ 'message' => 'Unsupported format' ], 400);
        }

    }
}
