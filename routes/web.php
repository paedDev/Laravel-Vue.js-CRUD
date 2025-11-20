<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;


 
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/products', [ProductController::class, 'index'])->name('productsIndex');
    Route::get('/products/create', [ProductController::class, 'create'])->name('productsCreate');
});
require __DIR__.'/settings.php';
