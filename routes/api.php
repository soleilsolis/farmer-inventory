<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/productTypes', [ProductTypeController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {

});

Route::controller(ProductTypeController::class)->group(function() {
    Route::get('/productType/{id}', 'show');
    Route::post('/productTypes', 'store');
    Route::post('/productType/{id}', 'update');
    Route::delete('/productType/{id}', 'destroy');
});

Route::controller(ProductController::class)->group(function() {
    Route::get('/product/{id}', 'show');
    Route::post('/products', 'store');
    Route::post('/product/{id}', 'update');
    Route::delete('/product/{id}', 'destroy');
});

Route::controller(User::class)->group(function() {
    Route::get('/users', 'index');
    Route::get('/uses/{id}', 'show');
    Route::post('/users', 'store');
    Route::post('/user/{id}', 'update');
    Route::delete('/user/{id}', 'destroy');
});