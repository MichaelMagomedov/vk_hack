<?php

namespace App\Root\Http\Middleware;

use Closure;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class FrameHeadersMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('X-Frame-Options', 'ALLOW FROM https://example.com/');
        return $response;
    }
}
