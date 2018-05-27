<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        $user = $request->user();
        // Si c’est un administrateur on continue, sinon on renvoie sur la page d’accueil.
        if ($user && $user->role === 'admin') {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
