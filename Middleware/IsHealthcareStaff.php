<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsHealthcareStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->guard('healthcare_staff')->user()){
            return $next($request);
        }
        return redirect()->route('auth.form_login_healthcare_staff');
    }
}
