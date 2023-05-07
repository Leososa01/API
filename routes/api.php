<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidacionController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
//ruta
Route::get('form', [ValidacionController::class,'index']);
//get recibir en form
Route::post('guardar', [ValidacionController::class,'guardar']);
//post enviar


