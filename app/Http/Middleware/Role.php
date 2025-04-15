<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {   
        if (!Auth::check()){
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        switch($userRole){
            case 'admin' :
                if($userRole == "admin"){
                    return $next($request);
                }
                break;
            case 'barber' :
                if($userRole == "barber"){
                    return $next($request);
                }
                break;
            case 'user' :
                if($userRole == "user"){
                    return $next($request);
                }
                break;
        }

        switch($userRole){
            case "admin" :
                return redirect()->route('admin');
            case "barber" :
                return redirect()->route('barber');
            case "user" :
                return redirect()->route('dashboard');
        }
        
        return redirect()->route('login');
    }
}
