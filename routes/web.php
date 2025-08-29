<?php


use Illuminate\Support\Facades\Route;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
   return view('welcome', ['products' => Product::all()]);
});

Route::get('/welcome', function () {
    return view('welcome', ['products' => Product::all()]);
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'product']);
Route::post('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'delete']);
Route::post('/new_product', [ProductController::class, 'create']);