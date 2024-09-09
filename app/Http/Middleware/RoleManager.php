<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        if(!Auth::check()){
            return redirect()->route('login');
        }
        
        $authUserRole = Auth::user()->role;

        switch ($role) {
            case 'admin':
                if($authUserRole == 'admin'){
                    return $next($request);
                }
            break;

            case 'guest':
                if($authUserRole == 'guest'){
                    return $next($request);    
                }
                break;
            case 'user':
                if($authUserRole == 'user'){
                    return $next($request);
                }
                break;
        }

        switch($authUserRole){
            case 'admin':
                return redirect()->route('admin.index');
            case 'guest':
                return redirect()->route('guest.index');            
            case 'user':
                return redirect()->route('dashboard');
        }

        return redirect()->route('login');
    }
}
