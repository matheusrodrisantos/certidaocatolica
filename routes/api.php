<?php

use App\Http\Controllers\API\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\PedidoController;
use App\Http\Controllers\API\V1\ParoquiaController;

Route::prefix('v1')->group(function()
{
    
    Route::prefix('pedido')->group(function(){
        Route::post('/store',[PedidoController::class,'store']);
        Route::put('/update/{pedido}',[PedidoController::class,'update'])->middleware('auth:sanctum');
    });

  
    Route::post('/login',[AuthController::class,'login']);
    Route::post('/register',[AuthController::class,'register']);
 

    Route::prefix('paroquia')->group(function(){
        Route::get('/list-all',[ParoquiaController::class,'index'])->middleware('auth:sanctum');
    });


});