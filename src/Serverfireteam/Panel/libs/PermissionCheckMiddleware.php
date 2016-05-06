<?php

namespace Serverfireteam\Panel\libs;

use Closure;

class PermissionCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    protected $app;

    public function handle($request, Closure $next)
    {
        $admin = \Auth::guard('panel')->user();

        if ($admin->is_admin)
        {
            return $next($request);
        } else {
            abort(403);
        }

    }
}
