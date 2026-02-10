<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\module5\CollectionsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class,'index'])->name('home');


//module 5


Route::get('module-5/collection-demo',[CollectionsController::class,'collections']);