<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class CheckEditer
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role > 0) {
            return $next($request);
        }
        else {
            return redirect()->back();
        }
    }
}