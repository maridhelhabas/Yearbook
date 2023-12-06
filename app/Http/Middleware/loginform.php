<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class loginform
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if($username === 'admin' && $password === 'admin'){
            return $next($request);
        }
        else{
            return redirect('/admin-login')->withErrors(['error'=>'Invalid Credentials']);
        }
        
    }
}
