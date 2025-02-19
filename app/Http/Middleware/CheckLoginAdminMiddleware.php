<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


use Closure;
use Illuminate\Http\Request;

class CheckLoginAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check() ){ //Không có admin nào đăng nhập
            return $next($request);
        }else if(Auth::check() && Auth::user()->role == "Ban biên tập" && Auth::user()->status == "1") {
            return redirect()->route('admin.dashboard');
        }else {
            Auth::logout();
            return redirect()->route('admin.login.index');
        }
            
           
    }
}