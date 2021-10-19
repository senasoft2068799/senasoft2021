<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Al entrar desde cualquier ruta, automáticamente se redirige a la vista welcome
// donde se tiene establecido el template de Vue
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
