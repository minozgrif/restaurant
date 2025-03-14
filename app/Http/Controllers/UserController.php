<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function asignarRol(Request $request)
{
    $user = User::find($request->user_id);
    if (!$user) {
        return response()->json(['message' => 'Usuario no encontrado'], 404);
    }

    $user->assignRole($request->role);

    return response()->json(['message' => "Rol '{$request->role}' asignado a {$user->name}"]);
}
}
