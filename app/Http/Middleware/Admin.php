<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        { if(Auth::user()->is_admin == 0) { return redirect()->back()->with('warning','You Are Not Admin'); } }
        return $next($request);
    }
}
