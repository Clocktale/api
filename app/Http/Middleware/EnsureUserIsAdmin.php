<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifique a regra de admin de acordo com a sua implementação (ex: role, is_admin, etc)
        if (!$request->user() || !$request->user()->hasRole('admin')) { // Exemplo com Spatie Permission
            return response()->json(['message' => 'Unauthorized. Admin access required.'], 401); // Retornando 401 como pedido na issue
        }

        return $next($request);
    }
}
