<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
Route::get('/',[CategoryController::class,'index'])->name('index');
Route::post('/add',[CategoryController::class,'addlist'])->name('add.list');
Route::get('/edit',[CategoryController::class,'Editlist'])->name('edit.list');
Route::put('/update',[CategoryController::class,'updatelist'])->name('update.list');
Route::delete('delete',[CategoryController::class,'deletelist'])->name('delete.list');
// Route::get('search',[CategoryController::class,'SearchList'])->name('search.list');
