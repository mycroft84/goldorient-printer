<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/settings', [MainController::class, 'settings'])->name('main.settings');
Route::get('/history', [MainController::class, 'history'])->name('main.history');
