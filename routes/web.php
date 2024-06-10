<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('cart')->group(function(){
        Route::get('/', [CartController::class, 'index'])->name('cart');
        Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
        Route::get('/finish', [CartController::class, 'finish'])->name('cart.finish');
        Route::delete('/{id}', [CartController::class, 'remove'])->name('cart.remove');
    });

    Route::prefix('/admin')->group(function () {
        Route::get('/',[HomeController::class, 'index'])->name('admin');

        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.product');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
            Route::post('/', [ProductController::class, 'store'])->name('admin.product.store');
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
            Route::put('/{id}', [ProductController::class, 'update'])->name('admin.product.update');
            Route::delete('/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
        });

    });
});



require __DIR__.'/auth.php';
