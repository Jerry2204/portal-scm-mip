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
    Route::post('users/{user}/update', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('users/add', [UserController::class, 'create'])->name('admin.users.add');
    Route::post('users/add', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('users/profile', [UserController::class, 'show'])->name('admin.users.show');
    Route::post('users/update/profile', [UserController::class, 'update_profile'])->name('users.profile.update');
    Route::delete('users/{user}/delete', [UserController::class, 'destroy'])->name('admin.users.delete');
});
