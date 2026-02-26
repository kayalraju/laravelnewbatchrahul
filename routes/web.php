<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\MiddlewareController;
use App\Http\Controllers\Model6\ProductController;
use App\Http\Controllers\module5\CollectionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');


//module 5


Route::get('module-5/collection-demo', [CollectionsController::class, 'collections']);

//module 6

Route::get('/product', [ProductController::class, 'list'])->name('product.list');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');


//middleware

Route::get('/student', [MiddlewareController::class, 'Student'])->name('student')->middleware('ageCheck');

//Route::get('/admin/dashboard',[MiddlewareController::class,'Admin'])->name('admin')->middleware('checkRole');

//group middleware route

// Route::group(['middleware'=>'ageCheck'],function(){
//     Route::get('/student1',[MiddlewareController::class,'Student'])->name('student1');
// });

Route::middleware('checkRole')->group(function () {
   Route::get('/admin/dashboard', [MiddlewareController::class, 'Admin'])->name('admin');
   Route::get('/admin/banner', [MiddlewareController::class, 'banner'])->name('banner');
});


//laravel guard auth rolebase

//route prefix

Route::prefix('user')->group(function () {
   Route::get('/register', [UserController::class, 'register'])->name('register');
   Route::post('/register/create', [UserController::class, 'registerPost'])->name('register.post');
   Route::get('/login', [UserController::class, 'login'])->name('login.view');
   Route::post('/login/create', [UserController::class, 'loginPost'])->name('login.post');



   Route::middleware('auth')->group(function () {
      Route::get('/dashboard', [UserController::class, 'userdashboard'])->name('user.dashboard');
      Route::get('/logout', [UserController::class, 'logout'])->name('logout');
   });
});
