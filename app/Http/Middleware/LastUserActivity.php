<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $expiresAt = now()->addMinutes(2);
            $key = auth()->id();
            cache()->put("is_online$key", true, $expiresAt);
            cache()->put("last_active_at$key", now());
        }
        return $next($request);
    }
}
