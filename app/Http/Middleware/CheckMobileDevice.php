<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;

class CheckMobileDevice
{
    public function handle(Request $request, Closure $next)
    {
        $agent = new Agent();

        if ($agent->isMobile() && $request->is('app/dashboard')) {
            return redirect('/app/dashboard/mobile');
        }

        return $next($request);
    }
}
