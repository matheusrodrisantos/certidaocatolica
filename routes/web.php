<?php

use App\Http\Controllers\WebHookController;
use Illuminate\Support\Facades\Route;

Route::get('/webhook', [WebHookController::class,'index']);
