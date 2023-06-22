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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('auth/register',[App\Http\Controllers\Api\AuthController::class,'register'])->name('api.auth.register');
Route::post('auth/login',[App\Http\Controllers\Api\AuthController::class,'login'])->name('api.auth.login');
Route::post('auth/me',[App\Http\Controllers\Api\AuthController::class,'me'])->middleware('auth:api');
Route::post('auth/logout',[App\Http\Controllers\Api\AuthController::class,'logout'])->middleware('auth:api');
Route::get('documentos/listar',[App\Http\Controllers\DocDocumentoController::class,'index'])->middleware('auth:api');
Route::post('documentos/{id}/update',[App\Http\Controllers\DocDocumentoController::class,'update'])->middleware('auth:api');
Route::delete('documentos/{id}/delete',[App\Http\Controllers\DocDocumentoController::class,'destroy'])->middleware('auth:api');
Route::get('documentos/{id}',[App\Http\Controllers\DocDocumentoController::class,'mostrar']);  //->middleware('auth:api');
