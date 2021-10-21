<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validación de datos para registro
        $request->validate([
            "nickname" => "required|string|alpha_dash|unique:users|min:4|max:12",
            "password" => "required|min:4|max:20|confirmed",
            "password_confirmation" => "required"
        ]);

        //Se crea el usuario y se encripta la contraseña
        $user = User::create([
            "nickname" => $request->nickname,
            "password" => Hash::make($request->password)
        ]);
        return response()->json(["msg" => "Usuario registrado correctamente."]);
    }

    public function login(Request $request)
    {
        //Validación datos login
        $request->validate([
            'nickname' => 'required',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        //Consulta de usuario con el nickname de entrada
        $user = User::where('nickname', $request->nickname)->first();

        // Se compara que la contraseña pertenezca a ese usuario
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'nickname' => ['Los datos de acceso son incorrectos.'],
            ]);
        }

        //Se genera un token en la bd que almacene el dispositivo actual del usuario y se retorna este
        $token = $user->createToken($request->device_name)->plainTextToken;
        return $token;
    }


    public function logout(Request $request)
    {
        // Se obtiene el token de acceso del usuario actual y se borra
        $request->user()->currentAccessToken()->delete();
        return response()->json(["msg" => "Sesión finalizada correctamente."]);
    }
}
