<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // se valida la informacion recibida en la solicitud
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // si la validacion falla, se devuelve un error 422
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // se crea un nuevo usuario con la informacion proporcionada
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // se devuelve una respuesta indicando que el usuario fue registrado con exito
        return response()->json(['message' => 'user registered successfully'], 201);
    }

    public function login(Request $request)
    {
        // se obtienen las credenciales de la solicitud (correo y contrasena)
        $credentials = $request->only('email', 'password');

        // si las credenciales no son validas, se devuelve un error 401
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'unauthorized'], 401);
        }

        // si las credenciales son validas, se devuelve el token JWT
        return response()->json(compact('token'));
    }
}
