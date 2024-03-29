<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');

Route::get('/messages/{id}', [MessagesController::class, 'show'])->name('messages.show');
Route::post('/messages', [MessagesController::class, 'store'])->name('messages.store');
Route::put('/messages/{id}', [MessagesController::class, 'update'])->name('messages.update');
Route::delete('/messages/{id}', [MessagesController::class, 'destroy'])->name('messages.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
