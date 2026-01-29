<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApplicantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isApplicant()) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
