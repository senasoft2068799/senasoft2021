<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "nickname" => "required|unique:users|min:4|max:12",
            "password" => "required|min:4|max:20|confirmed",
            "password_confirmation" => "required"
        ]);
    }
}
