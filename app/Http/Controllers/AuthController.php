<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;



class AuthController extends Controller
{
    // Metodo de registro para pacientes
    public function register(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|min:3|max:50',
                'lastname' => 'required|string|min:3|max:100',
                'role_id' => 'nullable|integer|exists:roles,id',
                'rut' => 'required|string|max:255',
                'telefono' => 'required|string|min:12|max:12', 
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Error de validacion',
                'errors' => $validator->errors()
            ], 422);
        }

        // Asignar el valor de role_id, predeterminado en 2 (si no se pasa en la solicitud)
        $role_id = $request->get('role_id', 2);  // Si no hay 'role_id', se usa el valor 2 (usuario normal)

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'role_id' => $role_id,
            'rut' => $request->rut,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Usuario registrado correctamente',
            'user' => $user
        ], 201);
    }

    // Metodo de login
    public function login(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|string|email',
                'password' => 'required|string|min:6',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Error de validacion',
                'errors' => $validator->errors()
            ], 422);
        }

        // Obtener la credenciales
        $credentials = $request->only('email', 'password');

        try{
            // Intentar generar el token
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Credenciales incorrectas'
                ], 401);
            }

            // Obtener los datos de usuario autenticados
            $user = Auth::user();

            // Retornar el token y los datos del usuario
            return response()->json([
                'status' => true,
                'message' => 'Usuario autenticado correctamente',
                'token' => $token,
                'user' => $user
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'Error al autenticar el usuario',
                'error' => $e->getMessage()
            ], 500);    
        }
    }

    // Metodo para obtener el usuario autenticado
    public function getUser()
    {
        $user = Auth::user();
        if ($user) {
            return response()->json([
                'status' => true,
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Usuario no autenticado'
            ], 401);
        }
    }
}
