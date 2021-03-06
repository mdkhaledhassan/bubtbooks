<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;

class LastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $expireTime = Carbon::now()->addMinute(1);
            Cache::put('is_online'.Auth::user()->id, true, $expireTime);
        }
        return $next($request);
    }
}
