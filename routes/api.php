<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    
    Route::prefix('items')->group(function () {
         Route::get('/search', [ItemController::class, 'search']);
        Route::get('/', [ItemController::class, 'index']);
        Route::get('/{item}', [ItemController::class, 'show']);
        Route::post('/', [ItemController::class, 'store']);
        Route::put('/{item}', [ItemController::class, 'update']);
        Route::delete('/{item}', [ItemController::class, 'destroy']);
        
    });
});