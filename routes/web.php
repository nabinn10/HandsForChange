<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;

Route::get('/', function () {
    return view('welcome')->name('welcome');
});



Route::middleware('auth')->group(function () {

    Route::get('/request/mageko', function () {
        return view('request.index');
    })->name('requestnow');

    route::post('/request', [RequestController::class, 'store'])->name('request.store');
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
