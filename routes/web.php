<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'registerPost'])->name('auth.register');
    Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'loginPost'])->name('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [App\Http\Controllers\Admin\AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{user}', [App\Http\Controllers\Admin\AdminController::class, 'show'])->name('admin.show');
    Route::delete('/admin/{user}', [App\Http\Controllers\Admin\AdminController::class, 'delete'])->name('admin.delete');

    Route::get('/event/{event}', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');
    Route::get('/event/show/{usersParty}', [App\Http\Controllers\EventController::class, 'show'])->name('event.show');
    Route::post('/event/{event}', [App\Http\Controllers\EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{event}', [App\Http\Controllers\EventController::class, 'deleteUserParty'])->name('event.deleteUserParty');
});
