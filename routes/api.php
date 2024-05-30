<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\PedidoController;

Route::prefix('v1')->group(function()
{
    Route::prefix('pedido')->group(function(){
        Route::post('/store',[PedidoController::class,'store']);
    });
});