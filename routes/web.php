<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index'); // /product is the url and the 'index' is the function name in controller
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');// view template for create page
Route::post('/product', [ProductController::class, 'store'])->name('product.store');//save new record in database
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');//get the specific record and display it in url
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');//update records in database
Route::delete('/product/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');//delete records