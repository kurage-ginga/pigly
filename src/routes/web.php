<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WeightController;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('weights.index')
        : redirect()->route('login');
});

Route::get('/register/step1', [RegisterController::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [RegisterController::class, 'postStep1'])->name('register.step1.post');

Route::get('/register/step2', [RegisterController::class, 'showStep2'])->name('register.step2');
Route::post('/register/step2', [RegisterController::class, 'postStep2'])->name('register.step2.post');

Route::get('/weights', [WeightController::class, 'index'])->middleware(['auth'])->name('weights.index');
Route::post('/weights', [WeightController::class, 'store'])->name('weight.store');

Route::put('/target', [WeightTargetController::class, 'update'])->name('target.update');

Route::get('/weights/{id}', [WeightController::class, 'show'])->name('weights.show');
Route::put('/weights/{id}', [WeightController::class, 'update'])->name('weights.update');
Route::delete('/weights/{id}', [WeightController::class, 'destroy'])->name('weights.destroy');