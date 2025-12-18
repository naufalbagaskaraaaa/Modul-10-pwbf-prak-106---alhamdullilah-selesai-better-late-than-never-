<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isPerawat
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

    // Gunakan loose comparison (==) jangan (===) agar tipe data string/int tidak masalah
    if (session('user_role') == 3){ 
        return $next($request);
    }

    return redirect('/')
    ->with('error', 'Akses Perawat Ditolak. Role Anda: ' . session('user_role'));
    }
}