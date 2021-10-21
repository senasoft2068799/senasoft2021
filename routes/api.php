<?php

use App\Http\Controllers\TableroController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PartidaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("login", [AuthController::class, "login"]);
Route::post("register", [AuthController::class, "register"]);
Route::post("logout", [AuthController::class, "logout"])->middleware("auth:sanctum");

Route::middleware('api')->group(function () {
    Route::post("crear-partida", [PartidaController::class, "crearPartida"]);
    Route::post("unirse-partida", [PartidaController::class, "unirsePartida"]);
    //Route::get("tableros", [TableroController::class, "index"]);
});
