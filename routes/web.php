<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    // Users
    Route::get('/users', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'viewUsers'])->name('users');
    Route::get('/addUser', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('addUser');
    Route::post('/storeUser', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])->name('storeUser');
});

require __DIR__.'/auth.php';
