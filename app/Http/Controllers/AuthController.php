<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
    $token = $user->createToken('auth-token')->plainTextToken;

    // Obtener los roles del usuario
    $roles = $user->roles;

    // Devolver la respuesta con el token y los roles
    return response()->json([
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'roles' => $roles, // Incluir los roles en la respuesta
        'token' => $token,
    ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out']);
    }
    
}
