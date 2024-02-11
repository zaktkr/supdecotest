<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->type === 1) {
            return $next($request);
        }
        else {
            return redirect()->back();
        }
    }
}
