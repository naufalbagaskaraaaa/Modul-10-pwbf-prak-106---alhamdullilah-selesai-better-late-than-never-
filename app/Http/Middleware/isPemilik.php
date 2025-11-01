<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isPemilik
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }

        $userRole=session('user_role');

        if (!in_array($userRole, [1, 2, 3, 4])){
            return $next($request);
        } else {
            return back()->with('error', 'akses ditolak mas');
        }
    }
}
