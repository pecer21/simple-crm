<?php

use App\Http\Controllers\User\ClientController;
use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::patch('/clients/{id}', [ClientController::class, 'restore'])->name('clients.restore');
    Route::resource('/clients', ClientController::class);
});
