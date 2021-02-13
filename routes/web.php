<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dbdi', [HomeController::class, 'dbdi'])->name('dbdi');
Route::get('/dbdii', [HomeController::class, 'dbdii'])->name('dbdii');
Route::get('/dbdiii', [HomeController::class, 'dbdiii'])->name('dbdiii');
Route::get('/konsultasi', [HomeController::class, 'konsultasi'])->name('konsultasi');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
