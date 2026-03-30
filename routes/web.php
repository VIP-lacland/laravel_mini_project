<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/formAdd', [ProductController::class, 'getAddForm'])->name('formAdd');
Route::post('store', [ProductController::class, 'store'])->name('store');
Route::post('/delete', [ProductController::class, 'delete'])->name('delete');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('edit');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('update');