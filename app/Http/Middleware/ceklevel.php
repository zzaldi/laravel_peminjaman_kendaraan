<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ceklevel
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request
     * @param \closure
     * @param \mixed


     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
