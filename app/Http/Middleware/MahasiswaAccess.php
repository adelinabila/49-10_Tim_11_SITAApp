<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Protects the Mahasiswa pages:
 *   1. the visitor must be logged in, otherwise they go to the login page
 *   2. the user's "role" must be one of the allowed roles, otherwise 403 (forbidden)
 *
 * Use it on a route like:  MahasiswaAccess::class . ':admin,dosen'
 */
class MahasiswaAccess
{
    // Roles that are allowed when the route does not list any.
    private const DEFAULT_ROLES = ['admin'];

    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        // Not logged in.
        if (! $user) {
            return Route::has('login')
                ? redirect()->guest(route('login'))
                : abort(401, 'Silakan login terlebih dahulu.');
        }

        // Logged in, but the role is not allowed.
        $allowed = $roles ?: self::DEFAULT_ROLES;

        if (! in_array($user->role, $allowed, true)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
