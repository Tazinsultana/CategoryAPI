<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
Route::get('/category',[CategoryController::class,'index'])->name('index');
Route::post('/add',[CategoryController::class,'addlist'])->name('add.list');
Route::get('/edit',[CategoryController::class,'Editlist'])->name('edit.list');
Route::put('/update',[CategoryController::class,'updatelist'])->name('update.list');
Route::delete('delete',[CategoryController::class,'deletelist'])->name('delete.list');


Route::get('/product',[ProductController::class,'Index'])->name('index.product');
Route::post('/add-product',[ProductController::class,'AddProduct'])->name('add.product');
Route::get('/edit-product',[ProductController::class,'EditProduct'])->name('edit.product');
Route::put('/update-product',[ProductController::class,'Update'])->name('update.product');
Route::delete('/delete-product',[ProductController::class,'Delete'])->name('delete.product');
Route::get('/filter-product',[ProductController:: class,'Filtering'])->name('filter.product');




