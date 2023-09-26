<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class non_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    // : Response
    {
        if ((session()->has('user_id') && session()->has('role'))) {
            if(session()->get('role') == 'Admin'){
                return redirect('admin_dashboard');
            }else{
                return redirect('After_home');
            }
        }
        return $next($request);
    }
}
