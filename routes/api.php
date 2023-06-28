<?php

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
    Route::get('/event', [App\Http\Controllers\API\EventController::class, 'index']);
    Route::get('/event/{event}', [App\Http\Controllers\API\EventController::class, 'showEvent']);
    Route::get('/event/show/{usersParty}', [App\Http\Controllers\API\EventController::class, 'showUser']);
    Route::post('/event', [App\Http\Controllers\API\EventController::class, 'store']);
    Route::post('/event/{event}', [App\Http\Controllers\API\EventController::class, 'addUserParty']);
    Route::delete('/event/{event}', [App\Http\Controllers\API\EventController::class, 'deleteUserParty']);
    Route::delete('/eventDelete/{event}', [App\Http\Controllers\API\EventController::class, 'deleteEvent']);
    Route::delete('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});

Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);


