<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Inertia\Inertia;
use App\Http\Controllers\TransactionController;

// Inertia pages
Route::inertia('/home', 'Home');
Route::inertia('/transactions', 'Transactions');
Route::inertia('/FAQ', 'FAQ');
Route::inertia('/contact', 'Contact');

// Authentication pages
Route::inertia('/', 'Auth/Login');
Route::inertia('/register', 'Auth/Register')->name('register');
Route::inertia('/login', 'Auth/Login')->name('login');

// AuthController actions
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Orders
Route::get('/order-summary', function () {
    return Inertia::render('OrderSummary', [
        'order' => request()->order,
    ]);
});

Route::inertia('/cart', 'Cart');

// ✅ **PRODUCT ROUTES** (GAMIT ANG CONTROLLER)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');



Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);
Route::delete('/cart/{id}', [CartController::class, 'destroy']);
Route::delete('/cart', [CartController::class, 'clear']);




Route::post('/transactions', [TransactionController::class, 'store']);


Route::get('/transactions', function () {
    return Inertia::render('Transactions', [
        'transactions' => \App\Models\Transaction::all(),
    ]);
});



