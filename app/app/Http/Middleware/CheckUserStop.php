<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStop
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          // ログインしていて、stop が 1 の場合
        if (Auth::check() && Auth::user()->stop == 1) {
            return redirect()->route('showStop'); // stop.blade.php を表示
        }
        return $next($request);
    }
}
