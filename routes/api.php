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
// busca 'validacioncontroller y abre la clase 'index' e ingresa los datos ahi
Route::post('guardar', [ValidacionController::class,'guardar']);
//post enviar 
//abre el controloador y guarda los datos en 'guardar'
//guardar es la ruta para poner en el postman

