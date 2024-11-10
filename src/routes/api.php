<?php

use Illuminate\Support\Facades\Route;
use Francis\ChatApi\Http\Controllers\ChatController;

Route::prefix("api")->group(
    function () {
        Route::get('/chat', [ChatController::class, 'index']);
        Route::post('/chat', [ChatController::class, 'sendMessage']);
    }

);
