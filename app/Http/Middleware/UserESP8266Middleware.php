<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ValidatorUser;

class UserESP8266Middleware
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
        $data = $request->only(['user_name', 'user_email']);
        new ValidatorUser('esp8266', $data);
        $user = User::where("alias_user", "=" , $data['user_name'])
                      ->where("email", "=" , $data['user_email'])
                      ->first();
        if(empty($user))
        {
            return back()->with('message',['danger', '¡Usuario inexistente!']);
        }
        return $next($request);
    }
}
