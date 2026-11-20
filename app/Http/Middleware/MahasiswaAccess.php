<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class MahasiswaAccess
{
    private const DEFAULT_ROLES = ['admin'];

    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            return Route::has('login')
                ? redirect()->guest(route('login'))
                : abort(401, 'Silakan login terlebih dahulu.');
        }

        $allowed = $roles ?: self::DEFAULT_ROLES;

        if (! in_array($user->role, $allowed, true)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
