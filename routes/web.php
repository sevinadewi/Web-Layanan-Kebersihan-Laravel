<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\OrderController;

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
    return view('dashboard');
});

// Route::get('/general', function () {
//     return view('generalCleaning');
// });

Route::get('/order', function () {
    return view('order');
});
// Route::get('/', [DashboardController::class, 'index'])->name('landing');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('/signup', [LoginController::class, 'signUp'])->name('signUp.post');
Route::post('/signin', [LoginController::class, 'authenticate'])->name('signIn.post');
Route::post('/order', [OrderController::class, 'order'])->name('order.post');

Route::get('/general', [DetailController::class, 'generalCleaning'])->name('generalCleaning.get');

