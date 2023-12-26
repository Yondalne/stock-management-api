<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ResourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    // Category management routes
    Route::resource('categories', CategoryController::class);

    // Operation management routes
    Route::resource('operations', OperationController::class);

    // Provider management routes
    Route::resource('providers', ProviderController::class);

    // Resource management routes
    Route::resource('resources', ResourceController::class);

});

// Route de connexion et de déconnexion
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/register', [AuthController::class, 'register']);
