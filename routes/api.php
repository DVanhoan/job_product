<?php

use App\Http\Controllers\Api\ConversationController;
use App\Http\Controllers\API\MessageController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;


Route::middleware('web')->group(function () {
    Route::get('/messages', [ConversationController::class, 'index']);
    Route::get('/conversations/{conversationId}', [ConversationController::class, 'show']);
    Route::post('/sendMessage', [MessageController::class, 'send'])->withoutMiddleware([VerifyCsrfToken::class]);;
});

