<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\PedidoController;
use App\Http\Controllers\API\V1\ParoquiaController;

Route::prefix('v1')->group(function()
{
    Route::prefix('pedido')->group(function(){
        Route::post('/store',[PedidoController::class,'store']);
    });

    Route::prefix('paroquia')->group(function(){
        Route::get('/list-all',[ParoquiaController::class,'index']);
    });
});