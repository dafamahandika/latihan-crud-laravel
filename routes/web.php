<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth')->group(function() {
     Route::get('/', function() {return redirect()->route('indexMoney');}); 
     
     Route::get('/home', [MoneyController::class, 'indexMoney'])->name('indexMoney');
     
     Route::get('/create', [MoneyController::class, 'createMoney'])->name('createMoney');
     Route::post('/create', [MoneyController::class, 'storeMoney'])->name('storeMoney');
     
     Route::get('/edit/{id}', [MoneyController::class, 'editMoney'])->name('editMoney');
     Route::post('/edit/{id}', [MoneyController::class, 'updateMoney'])->name('updateMoney');
     
     Route::post('/delete/{id}',[MoneyController::class, 'destroyMoney' ]) -> name('destroyMoney');
});

Route::get('/register', [AuthController::class, 'indexRegister'])->name('register');
Route::post('/register', [AuthController::class,'storeRegister'])->name('storeRegister');

Route::middleware('guest')->group(function() {
     Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
     Route::post('/login', [AuthController::class,'storeLogin'])->name('storeLogin');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');