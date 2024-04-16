<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\User;


class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->user_type==1){
            return $next($request);
        }
        abort(403, 'Access Denied');
        #session(['error' => 'Access Denied', 'msg' => 'ผู้ใช้งานในส่วนนี้เป็นผู้ดูแลระบบเท่านั้น']);
        #return redirect()->route('error');
    }
}
