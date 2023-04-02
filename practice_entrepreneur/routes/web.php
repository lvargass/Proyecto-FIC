<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormalizeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'createProcess'])->middleware(['auth', 'verified'])->name('create');

Route::get('/formalize/{id}', [FormalizeController::class, 'index'])->middleware(['auth', 'verified'])->name('formalize');
Route::post('/formalize/{id}', [FormalizeController::class, 'completeProcess'])->middleware(['auth', 'verified'])->name('formalize.completeProcess');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
