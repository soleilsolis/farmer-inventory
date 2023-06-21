<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\ProductTypeVariantController;
use App\Http\Controllers\SellerController;
use App\Models\User;

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

        $weather = json_decode(Http::get("https://api.weatherapi.com/v1/forecast.json?key=bc1d071e2cf04b6ea0a184710231604&q=Roxas,Isabela&days=5")->body());
       
        return view('dashboard', compact('products','weather'));
    })->name('dashboard');

    Route::get('/productTypes', [ProductTypeController::class, 'index'])->name('productTypes');
    Route::get('/productType/{id}', [ProductTypeController::class, 'edit'])->name('productType');

    Route::get('/productTypeVariants', [ProductTypeVariantController::class, 'index'])->name('productTypeVariants');
    Route::get('/productTypeVariant/{id}', [ProductTypeVariantController::class, 'edit'])->name('productTypeVariant');
    
    Route::get('/sellers', [SellerController::class, 'index'])->name('sellers');
    Route::get('/seller/{id}', [SellerController::class, 'edit'])->name('seller');

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product-show');

    Route::middleware('admin')->get('/product/{id}/variant/new', [VariantController::class, 'create'])->name('variant-new');
    Route::get('/product/{id}/variant/{variant_id}', [ProductController::class, 'show'])->name('product-show');
    
    Route::middleware('admin')->group(function(){
        Route::get('/productTypes/new', [ProductTypeController::class, 'create'])->name('productTypes-new');
        Route::get('/sellers/new', [SellerController::class, 'create'])->name('seller-new');
        Route::get('/products/new', [ProductController::class, 'create'])->name('products-new');
        Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product-edit');

        Route::get('/users', function() {
            $users = User::all();
            return view('users', compact('users'));
        })->name('users');
            
        Route::get('/variant/{id}/edit', [VariantController::class, 'edit'])->name('variant-edit');
        Route::get('/sms-blast', [MessageController::class, 'index'])->name('sms-blast');
    });
});
