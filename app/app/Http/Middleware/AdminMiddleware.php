<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!$user) {
            $userName = session('user');
            $user = new \App\Models\User(['name' => $userName]);
        }

        if ($user->isAdmin()) {
            return $next($request);
        }

        Auth::logout();
        return redirect()->route('login')->with('error', 'Vous n\'etes pas autorisé à accéder à ce tableau de bord.');
    }
}
