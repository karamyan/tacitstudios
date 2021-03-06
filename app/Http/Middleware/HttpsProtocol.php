<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class HttpsProtocol
 *
 * @package App\Http\Middleware
 */
class HttpsProtocol
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
        if (!$request->secure() && app()->environment() !== 'local') {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
