<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Models\Item;
use App\Models\User;
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


Route::redirect('/', '/home');

Route::get('/home', [ItemController::class, 'index'])->name('home');
Route::view('/success', 'success')->name('success')->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::get('/maintenance', [AdminController::class, 'maintenance'])->name('maintenance')->middleware('admin');
Route::get('/profile/{id}', [UserController::class, 'update'])->name('profile')->middleware('auth');
Route::post('/profile', [UserController::class, 'change'])->name('profile.update')->middleware('auth');
Route::get('/register', [AuthController::class, 'showRegister'])->name('view.register');
Route::view('/login', 'auth.login')->name('view.login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/update/{id}', [AdminController::class, 'update'])->name('view.update')->middleware('admin');
Route::post('/update/{id}', [AdminController::class, 'change'])->name('update')->middleware('admin');
Route::post('/delete/{id}', [AdminController::class, 'delete'])->name('delete')->middleware('admin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/cart/add', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
Route::get('/cart/delete', [CartController::class, 'delete'])->name('cart.delete')->middleware('auth');
Route::get('item/{id}', [ItemController::class, 'show'])->name('item.show');
Route::post('checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
