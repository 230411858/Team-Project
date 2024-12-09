<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/products');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/category/{category}', [ProductController::class, 'category']);

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::post('/add', [ProductController::class, 'addBasketItem']);

Route::post('/remove', [ProductController::class, 'removeBasketItem']);

Route::get('/checkout', [ProductController::class, 'checkout']);

Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';