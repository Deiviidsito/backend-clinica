<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('api')->user();

        // Verifica si el usuario está autenticado y tiene el rol de administrador
        if ($user && $user->role_id == 1) { // 1 es el ID del rol de administrador
            return $next($request);
        }
        // Si no es admin, devuelve un error 403
        return response()->json([
            'status' => false,
            'message' => 'No tienes permiso para acceder a este recurso'
        ], 403);
    }
}
