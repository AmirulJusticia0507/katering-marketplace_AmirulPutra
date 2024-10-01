<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;

// Halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk registrasi customer
Route::get('/register/customer', [RegisterController::class, 'showCustomerRegistrationForm'])->name('customer.register');
Route::post('/register/customer', [RegisterController::class, 'registerCustomer']);

// Authentication routes
Auth::routes();

// Dashboard Home setelah login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes untuk Merchant (Portal Katering)
Route::middleware(['auth'])->group(function () {
    Route::resource('merchants', MerchantController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('invoices', InvoiceController::class);
});

// Routes untuk Customer (Portal Kantor)
Route::middleware(['auth'])->group(function () {
    Route::resource('customers', CustomerController::class);

    // Pencarian Katering
    Route::get('/search/katering', [App\Http\Controllers\SearchController::class, 'searchKatering'])->name('search.katering');

    // Pembelian oleh Customer
    Route::post('/orders/create', [OrderController::class, 'createOrder'])->name('orders.createOrder');

    // Tampilkan Invoice untuk Customer
    Route::get('/invoices/{invoice}/customer', [InvoiceController::class, 'showForCustomer'])->name('invoices.showForCustomer');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
