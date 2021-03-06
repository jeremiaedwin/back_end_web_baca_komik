<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->token){
            $check = User::where('token', $request->token)->first();

            if(!$check)
            {
                return response('Token tidak valid', 401);
            }
            else
            {
                return $next($request);
            }
        }else{
            return response('Silahkan Masukkan Token.', 401);
        }
    }
}
