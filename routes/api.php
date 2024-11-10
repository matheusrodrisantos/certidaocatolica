<?php

use App\Http\Controllers\API\V1\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\PedidoController;
use App\Http\Controllers\API\V1\ParoquiaController;
use App\Http\Controllers\API\V1\CertidaoController;

Route::prefix('v1')->group(function()
{
    
    Route::prefix('pedido')->group(function(){
        Route::post('/store',[PedidoController::class,'store']);
        Route::put('/update/{pedido}',[PedidoController::class,'update'])->middleware('auth:sanctum');
        Route::post('/upload/{pedido}',[PedidoController::class,'upload']);
        Route::get('/list-all',[PedidoController::class,'index'])->middleware('auth:sanctum');
        Route::get('/list/{paroquia}',[PedidoController::class,'show']);
    });

  
    Route::post('/login',[AuthController::class,'login']);
    Route::post('/register',[AuthController::class,'register']);
 

    Route::prefix('paroquia')->group(function(){
        Route::get('/list-all',[ParoquiaController::class,'index'])->middleware('auth:sanctum');
    });

    Route::prefix('certidao')->group(function(){
        Route::post('/store',[CertidaoController::class,'store']);
        Route::put('/update/{certidao}',[CertidaoController::class,'update']);
        Route::get('/list-all',[CertidaoController::class,'index']);
        Route::get('/list/{certidao}',[CertidaoController::class,'show']);
    });
});   
