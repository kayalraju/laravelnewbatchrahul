<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\MiddlewareController;
use App\Http\Controllers\Model6\ProductController;
use App\Http\Controllers\module5\CollectionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OneToONeController;
use App\Http\Controllers\OneToManyController;
use App\Http\Controllers\QueryBuilderController;
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

// Route::middleware('checkRole')->group(function () {
//    Route::get('/admin/dashboard', [MiddlewareController::class, 'Admin'])->name('admin');
//    Route::get('/admin/banner', [MiddlewareController::class, 'banner'])->name('banner');
// });


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


//admin 

Route::prefix('admin')->group(function () {
   Route::get('/register', [AdminController::class, 'adminRegister'])->name('admin.register');
   //Route::post('/register/create', [AdminController::class, 'adminRegisterPost'])->name('admin.register.post');
   Route::get('/login', [AdminController::class, 'adminLogin'])->name('admin.login.view');
   Route::post('/login/create', [AdminController::class, 'adminLoginPost'])->name('admin.login.post');
   Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');


   Route::middleware('auth.admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        
    });

});


//one to one relationship

Route::get('/author', [OneToOneController::class, 'createAuthor'])->name('author');
Route::post('/author/store', [OneToOneController::class, 'storeAuthor'])->name('author.store');
//Route::get('/author/blog/{id}', [OneToOneController::class, 'authorBlog'])->name('author.blog');
Route::get('/blog', [OneToOneController::class, 'createBlog'])->name('blog');
Route::post('/blog/store', [OneToOneController::class, 'storeBlog'])->name('blog.store');
Route::get('/bloglist', [OneToOneController::class, 'authorBlogList'])->name('blog.list');
Route::get('/author/blog/{id}', [OneToOneController::class, 'authorBlog'])->name('author.blog');



// one to many relationship

Route::get('/create/company', [OneToManyController::class, 'createCompany'])->name('company');
Route::get('/create/employee', [OneToManyController::class, 'createEmployee'])->name('employee');
Route::get('/company/with/employee', [OneToManyController::class, 'companyWithEmployee'])->name('cpmpany.with.employee');
Route::get('/employee/with/company', [OneToManyController::class, 'employeeWithCompany'])->name('employee.with.company');


//query builder

Route::get('/query', [QueryBuilderController::class, 'index'])->name('query.builder');  
Route::get('/query/add', [QueryBuilderController::class, 'createdata'])->name('query.create');  
Route::post('/query/store', [QueryBuilderController::class, 'store'])->name('query-builder.store');  
Route::get('/query/edit/{id}', [QueryBuilderController::class, 'edit'])->name('query-builder.edit');  
Route::get('/query/edit/{id}', [QueryBuilderController::class, 'edit'])->name('query-builder.edit');
Route::put('/query-builder/{id}', [QueryBuilderController::class, 'update'])->name('query-builder.update');
Route::delete('/query-builder/delete/{id}', [QueryBuilderController::class, 'delete'])->name('query-builder.delete');


Route::get('/search', [QueryBuilderController::class, 'search'])->name('query-builder.search');


