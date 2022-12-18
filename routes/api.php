<?php

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

Route::get('/persona', 'App\Http\Controllers\PersonaController@index'); //mostrar registros
Route::get('/persona/{id}', 'App\Http\Controllers\PersonaController@show'); //mostrar registro por id
Route::post('/persona/crear', 'App\Http\Controllers\PersonaController@store'); //crear un registro
Route::put('/persona/{id}', 'App\Http\Controllers\PersonaController@update'); //actualizar un registro
Route::delete('/persona/{id}', 'App\Http\Controllers\PersonaController@destroy'); //eliminar un registro

