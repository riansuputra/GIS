<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Guest;
use App\Http\Middleware\User;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PuraController;

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

Route::get('/', [PuraController::class,'index'])->name('index');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'loginForm'])->name('loginform');
Route::get('/register', [RegisterController::class, 'registerForm'])->name('registerform');
Route::get('/signout', [LoginController::class, 'signout'])->name('signout');

Route::get('/tambahpura', [PuraController::class, 'create'])->name('tambahpura');
Route::post('create', [PuraController::class, 'store'])->name('create');
Route::post('/{id}/edit', [PuraController::class, 'update'])->name('update'); 
Route::get('/{id}/delete', [PuraController::class, 'destroy'])->name('delete'); 
    
