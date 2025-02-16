<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ServiceDetailController;

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
Route::get('/service-detail/{name}', [ServiceDetailController::class, 'serviceByName']); //{category} akan diisi dengan nilai yang diketik oleh pengguna di URL.
// Route::middleware(['auth', 'role:admin'])->group(function () {

// });

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

Route::get('admin-dashboard', '\App\Http\Controllers\Admin\AdminController@index')->name('admin-dashboard');
Route::get('admin-services', [AdminController::class, 'services'])->name('admin-services');
Route::get('/admin-services/{id_service}', [AdminController::class, 'deleteServices']);
    Route::post('/admin-services', [AdminController::class, 'createServices']);
    Route::put('/admin-services/{id_service}', [AdminController::class, 'editServices']);
