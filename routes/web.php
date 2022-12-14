<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TxController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/index', [TxController::class, 'index'])->name('transaction.index');
    Route::get('/create', [TxController::class, 'create'])->name('transaction.create');
    Route::get('/store', [TxController::class, 'store'])->name('transaction.store');    
    Route::get('/show', [TxController::class, 'show'])->name('transaction.show');
    Route::get('/edit', [TxController::class, 'edit'])->name('transaction.edit');
    Route::get('/update', [TxController::class, 'update'])->name('transaction.update');
    Route::get('/destroy', [TxController::class, 'destroy'])->name('transaction.destroy');
});

//Google
Route::get('/login/google', [AuthenticatedSessionController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [AuthenticatedSessionController::class, 'handleGoogleCallback']);

require __DIR__.'/auth.php';
