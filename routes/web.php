<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Guest;
use App\Http\Middleware\User;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PuraController;
use App\Http\Controllers\PelinggihController;
use App\Http\Controllers\PengurusController;

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
Route::get('/daftarpura', [PuraController::class, 'show'])->name('daftarpura');
Route::get('/{id}/detailpura', [PuraController::class, 'detail'])->name('detailpura');
Route::post('create', [PuraController::class, 'store'])->name('createpura');
Route::post('/{id}/editpura', [PuraController::class, 'update'])->name('updatepura'); 
Route::get('/{id}/deletepura', [PuraController::class, 'destroy'])->name('deletepura'); 
    
Route::get('/tambahpelinggih', [PelinggihController::class, 'create'])->name('tambahpelinggih');
Route::get('/daftarpelinggih', [PelinggihController::class, 'show'])->name('daftarpelinggih');
Route::get('/{id}/daftarpelinggih', [PelinggihController::class, 'showlist'])->name('daftarlistpelinggih');
Route::get('/{id}/detailpelinggih', [PelinggihController::class, 'detail'])->name('detailpelinggih');
Route::post('/{id}/createpelinggih', [PelinggihController::class, 'store'])->name('createpelinggih');
Route::post('/{id}/editpelinggih', [PelinggihController::class, 'update'])->name('updatepelinggih'); 
Route::get('/{id}/deletepelinggih', [PelinggihController::class, 'destroy'])->name('deletepelinggih'); 

Route::get('/tambahpengurus', [PengurusController::class, 'create'])->name('tambahpengurus');
Route::get('/daftarpengurus', [PengurusController::class, 'show'])->name('daftarpengurus');
Route::get('/{id}/daftarpengurus', [PengurusController::class, 'showlist'])->name('daftarlistpengurus');
Route::get('/{id}/detailpengurus', [PengurusController::class, 'detail'])->name('detailpengurus');
Route::post('/{id}/createpengurus', [PengurusController::class, 'store'])->name('createpengurus');
Route::post('/{id}/editpengurus', [PengurusController::class, 'update'])->name('updatepengurus'); 
Route::get('/{id}/deletepengurus', [PengurusController::class, 'destroy'])->name('deletepengurus'); 