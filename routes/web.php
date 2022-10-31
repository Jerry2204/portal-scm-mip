<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('scm/dashboard', [HomeController::class, 'dashboard'])->name('scm.dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('users', [UserController::class, 'index'])->name('admin.users');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::get('users/{user}/update', [UserController::class, 'update'])->name('admin.users.update');
});
