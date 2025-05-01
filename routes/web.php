<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminMainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

// Routes cho Customer (chỉ xem sản phẩm)
Route::middleware(['auth', 'verified', 'rolemanager:customer'])->prefix('customer')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'show')->name('dashboard'); // Hiển thị sản phẩm cho customer
        Route::get('/products/{product}', 'showDetail')->name('product_detail'); // Hiển thị chi tiết sản phẩm
    });

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin');
        });
 
       Route::controller(ProductController::class)->group(function () {
            Route::get('/products', 'index')->name('admin.products.index');
            Route::get('/products/create', 'create')->name('admin.products.create');
            Route::post('/products/store', 'store')->name('admin.products.store');
            Route::get('/products/edit/{product}', 'edit')->name('admin.products.edit');
            Route::patch('/products/update/{product}', 'update')->name('admin.products.update');
            Route::delete('/products/delete/{product}', 'destroy')->name('admin.products.destroy');
        });

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
 });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
