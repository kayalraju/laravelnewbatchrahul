<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Model6\ProductController;
use App\Http\Controllers\module5\CollectionsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class,'index'])->name('home');


//module 5


Route::get('module-5/collection-demo',[CollectionsController::class,'collections']);

//module 6

Route::get('/product',[ProductController::class,'list'])->name('product.list');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');