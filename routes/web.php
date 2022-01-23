<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LoginController;
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

Route::get('/', [IndexController::class, 'index']);

// Route::get('/admin', [IndexController::class, 'index']);

Route::get('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
