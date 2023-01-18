<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;

use App\Models\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $products = Product::all();
        return view('dashboard', compact('products'));
    })->name('dashboard');

    Route::get('/productTypes', [ProductTypeController::class, 'index'])->name('productTypes');
    Route::get('/productTypes/new', [ProductTypeController::class, 'create'])->name('productTypes-new');
    Route::get('/productType/{id}', [ProductTypeController::class, 'edit'])->name('productType');

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/new', [ProductController::class, 'create'])->name('products-new');
    Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product');

    Route::get('/users', function () {
        return view('users');
    })->name('users');
});
