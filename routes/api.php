<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudObras;
use App\Http\Controllers\Users;
use App\Http\Controllers\CrudHerramientas;

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
Route::get('/asignacionxusuario', [Users::class, 'asignacionxusuario'])->name('asignacionxusuario');
Route::post('/addherramienta_user', [CrudHerramientas::class, 'addherramienta_user'])->name('addherramienta_user');