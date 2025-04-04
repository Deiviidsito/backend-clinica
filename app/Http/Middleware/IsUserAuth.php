<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario está autenticado
        $user = auth('api')->user();

        // Si el usuario no esta autenticado, devuelve un error 401
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'No autenticado'
            ], 401);
        }
        // Si el usuario está autenticado, permite el acceso a la ruta
        return $next($request);
    }
}
