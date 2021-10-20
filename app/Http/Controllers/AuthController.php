<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "nickname" => "required|unique:users|min:4|max:12",
            "password" => "required|min:4|max:20|confirmed",
            "password_confirmation" => "required"
        ]);
        $user = User::create([
            "nickname" => $request->nickname,
            "password" => Hash::make($request->password)
        ]);
        return response()->json(["msg" => "Usuario registrado correctamente."]);
    }

    public function login(Request $request)
    {
    }
}
