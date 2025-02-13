<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Inertia\Inertia;

// Inertia pages
Route::inertia('/products', 'Products');
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

//Orders

Route::get('/order-summary', function () {
    return Inertia::render('OrderSummary', [
        'order' => request()->order,
    ]);
});

Route::inertia('/cart', 'Cart');




